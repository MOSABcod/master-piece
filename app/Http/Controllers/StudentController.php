<?php

namespace App\Http\Controllers;

use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class StudentController extends Controller
{
    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:xlsx,csv',
        ], [
            'file.required' => 'يرجى اختيار ملف Excel أو CSV.',
            'file.mimes' => 'يجب أن يكون الملف بصيغة Excel (xlsx) أو CSV.',
        ]);

        $errors = [];

        try {
            $filePath = $request->file('file')->getPathName();
            $fileType = $request->file('file')->getClientOriginalExtension();
            // dd($fileType);
            if (!file_exists($filePath)) {
                throw new \Exception('لم يتم العثور على الملف: ' . $filePath);
            }

            if ($fileType === 'csv') {
                $reader = ReaderEntityFactory::createCSVReader();
                // dd("csv if");
            } elseif ($fileType === 'xlsx') {
                $reader = ReaderEntityFactory::createXLSXReader();
            } else {
                throw new \Exception('صيغة الملف غير مدعومة. يرجى اختيار ملف بصيغة CSV أو XLSX.');
            }

            $reader->open($filePath);

            foreach ($reader->getSheetIterator() as $sheet) {
                foreach ($sheet->getRowIterator() as $row) {
                    $cells = $row->toArray();

                    try {

                        if (count($cells) < 3) {
                            throw new \Exception('الصف يحتوي على بيانات غير مكتملة.');
                        }

                        if (empty($cells[0]) || empty($cells[1]) || empty($cells[2])) {
                            throw new \Exception('اسم المستخدم، الرقم الوطني، وكلمة المرور مطلوبة.');
                        }

                        $newUser = new User();
                        $newUser->name = $cells[0];
                        $newUser->national_id = $cells[1];
                        $newUser->password = bcrypt($cells[2]);
                        $newUser->role = 'student';
                        $newUser->age = $cells[3] ?? null;
                        $newUser->class_id = $cells[4] ?? null;
                        // dd($newUser);
                        if (!$newUser->save()) {
                            // Handle the error if save fails
                            throw new \Exception("Failed to save user: " . json_encode($cells));
                        }
                    } catch (\Exception $e) {
                        $errors[] = 'خطأ في الصف: ' . implode(', ', $cells) . ' - ' . $e->getMessage();
                    }
                }
            }

            $reader->close();

            if (!empty($errors)) {
                return redirect()->back()->with('error', implode('<br>', $errors));
            }

            return redirect()->back()->with('success', 'تم رفع الطلاب بنجاح!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'حدث خطأ أثناء رفع الملف: ' . $e->getMessage());
        }
    }
}
