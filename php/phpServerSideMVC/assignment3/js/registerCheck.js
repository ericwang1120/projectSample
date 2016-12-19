/**
 * 159339Assignment3
 * XIN WANG 15397438
 * Tianxiang Han 13064237
 * Zhen Cheng 13040788
 */
$(document).ready(function () {

    /**
     * Check empty of one input
     * @param element
     * @returns {boolean}
     */
    var checkEmpty = function (element) {
        if (element.val() == "") {
            element.css("border-color", "red");
            return false;
        }
        else {
            element.css("border-color", "");
            return true;
        }
    };

    /**
     *  Check empty for all inputs
     * @returns {boolean}
     */
    var checkEmptyAll = function () {
        var checked = true;
        $("input").each(function () {
            var element = $(this);
            checkEmpty(element);
            if (checked == true) {
                checked = checkEmpty(element);
            }
        });
        return checked;
    };

    /**
     *
     */
    $("input").on('input', function () {
        checkEmpty($(this));
    });

    var checkValidUserName = function (element) {
        var pattern = /^[a-z0-9A-Z_]*$/;
        if (pattern.test(element.val())) {
            element.css("border-color", "");
            $("#userLabel").text("");
            return true;
        } else {
            element.css("border-color", "red");
            $("#userLabel").text("Only alphanumeric characters");
            return false;
        }
    };

    var existedFlag = false;
    var checkExisted = function (element) {
        if (element.val() !== "") {
            var url = "../User/checkIfExisted?userName=" + element.val();
            var ajax = $.get(url, function (data) {
                $("#userLabel").text(data);
                if (data == "Valid username!") {
                    element.css("border-color", "");
                }
                else {
                    element.css("border-color", "red");
                }
            });
            ajax.done(function (data) {
                existedFlag = (data == "Valid username!");
            });
        }
        else {
            element.css("border-color", "red");
            $("#userLabel").text("Invalid username!");
        }
    };

    var checkUserName = function (element) {
        if (checkValidUserName(element)) {
            checkExisted(element);
        }
    };

    $("#userName").on('input', function () {
            checkUserName($(this));
        }
    );

    var repeatInput = $('input[name=passwordRepeat]');
    var checkRepeated = function () {
        if (repeatInput.val() == $('input[name=userPassword]').val()) {
            if (repeatInput.val() != "") {
                repeatInput.css("border-color", "");
            }
            $("#passwordRepeatLabel").text("");
            return true;
        } else {
            repeatInput.css("border-color", "red");
            $("#passwordRepeatLabel").text("The passwords are not same");
            return false;
        }
    };

    var checkPassword = function (element) {
        var pattern = /^(?=.*[A-Z])(?=.*[0-9])(?=.*[@$%^&_]).{7,15}$/;
        if (pattern.test(element.val())) {
            element.css("border-color", "");
            $("#passwordLabel").text("");
            return true;
        } else {
            element.css("border-color", "red");
            $("#passwordLabel").text("7-15 letters,at least 1 upper case and 1 from '@$%^&_'");
            return false;
        }
    };


    $('input[name=userPassword]').on('input', function () {
            checkRepeated();
            checkPassword($(this));
        }
    );

    $('input[name=passwordRepeat]').on('input', function () {
            checkRepeated();
        }
    );

    function isValidEmailAddress(element) {
        var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
        if (!pattern.test(element.val())) {
            $("#emailLabel").text("Invalid email address!");
            element.css("border-color", "red");
        }
        else {
            $("#emailLabel").text("");
            element.css("border-color", "");
        }
        return pattern.test(element.val());
    };

    $('input[name=userEmail]').on('input', function () {
            isValidEmailAddress($(this));
        }
    );

    $("form").submit(function () {
        var validateFlag = (checkEmptyAll() && checkValidUserName($("#userName")) && existedFlag && checkRepeated() && isValidEmailAddress($('input[name=userEmail]')) && checkPassword($('input[name=userPassword]')));
        if (validateFlag === false) {
            alert("Please check your input!");
            return false;
        }
    });
});

