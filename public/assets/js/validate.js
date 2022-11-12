$.validator.setDefaults({
    submitHandler: function () { alert("submitted!"); }
});
$(document).ready(function () {
    $("#form1").validate({
        rules: {
            password: { required: true, minlength: 5 },
            email: { required: true, email: true }
        },
        messages: {
            password: {
                required: "Bạn chưa nhập mật khẩu",
                minlength: "Mật khẩu phải có ít nhất 5 ký tự"
            },
            email: "Hộp thư điện tử không hợp lệ",
        },
        errorElement: "div",
        errorPlacement: function (error, element) {
            error.addClass("form-message ");
            if (element.prop("type") === "checkbox") {
                error.insertAfter(element.siblings("lable"));
            } else {
                error.insertAfter(element);
            }
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass("is-invalid").removeClass("is-valid");
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).addClass("is-valid").removeClass("is-invalid");
        }
    });

    $("#form2").validate({
        rules: {
            fullname: { required: true, minlength: 2 },
            password: { required: true, minlength: 5 },
            cf_password: { required: true, minlength: 5, equalTo: "#password" },
            email: { required: true, email: true },
            phone: "required",
            address: "required"
        },
        messages: {
            fullname: {
                required: "Bạn chưa nhập vào tên đăng nhập",
                minlength: "Tên đăng nhập phải có ít nhất 2 ký tự"
            },
            password: {
                required: "Bạn chưa nhập mật khẩu",
                minlength: "Mật khẩu phải có ít nhất 5 ký tự"
            },
            confirm_password: {
                required: "Bạn chưa nhập mật khẩu",
                minlength: "Mật khẩu phải có ít nhất 5 ký tự",
                equalTo: "Mật khẩu không trùng khớp với mật khẩu đã nhập"
            },
            email: "Hộp thư điện tử không hợp lệ",
            phone: "Vui lòng nhập số điện thoại của bạn!",
            address: "Vui lòng không bỏ trống!"
        },
        errorElement: "div",
        errorPlacement: function (error, element) {
            error.addClass("form-message ");
            if (element.prop("type") === "checkbox") {
                error.insertAfter(element.siblings("lable"));
            } else {
                error.insertAfter(element);
            }
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass("is-invalid").removeClass("is-valid");
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).addClass("is-valid").removeClass("is-invalid");
        }
    });
});