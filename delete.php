<?php
include "db.php"; // الاتصال بقاعدة البيانات

if (isset($_POST['delete_all'])) {
    // حذف كل الرسائل من الجدول
    $query = "DELETE FROM `chat-1`";
    $run = mysqli_query($con, $query);

    if ($run) {
        echo "<script>alert('All messages have been deleted.');</script>";
    } else {
        echo "<script>alert('Failed to delete messages.');</script>";
    }
}

// إعادة التوجيه إلى الصفحة الرئيسية بعد الحذف
header("Location: index.php");
?>
