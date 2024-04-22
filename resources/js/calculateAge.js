// Định nghĩa một hàm để tính toán tuổi từ ngày sinh
function calculateAge(dateOfBirth) {
    var today = new Date();
    var birthDate = new Date(dateOfBirth);
    var age = today.getFullYear() - birthDate.getFullYear();
    var monthDiff = today.getMonth() - birthDate.getMonth();
    if (
        monthDiff < 0 ||
        (monthDiff === 0 && today.getDate() < birthDate.getDate())
    ) {
        age--;
    }
    return age;
}

// Sử dụng jQuery để xử lý sự kiện khi người dùng nhập ngày sinh
$("#DateOfBirth").on("change", function () {
    var dateOfBirth = $(this).val();
    var age = calculateAge(dateOfBirth);
    $("#Age").val(age); // Điền tuổi vào ô Age
});
