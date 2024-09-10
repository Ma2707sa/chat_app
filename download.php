<?php
// المسار إلى الملف الذي سيتم تنزيله
$file = 'path/to/your-app.apk'; // يمكنك وضع مسار التطبيق هنا

// التحقق من أن الملف موجود
if (file_exists($file)) {
    // إعداد الهيدر لتنزيل الملف
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="' . basename($file) . '"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));
    
    // قراءة محتوى الملف وإرساله إلى المستخدم
    readfile($file);
    exit;
} else {
    echo "File not found!";
}
?>
