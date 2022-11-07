function onGetClick() {
    if(!window.recaptchaVerifier) {
        firebase.auth().useDeviceLanguage();
        window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('recaptcha-container', {
            'size': 'invisible',
            'callback': (response) => {
                // reCAPTCHA solved, allow signInWithPhoneNumber.
                // onSignInSubmit();
                time(document.getElementById('get_code'));
            }
        });
    }
    // const phoneNumber = document.getElementById('customer_tel').value;  //測試
    const phoneNumber = '+886'+document.getElementById('customer_tel').value;
    const appVerifier = window.recaptchaVerifier;
    firebase.auth().signInWithPhoneNumber(phoneNumber, appVerifier)
        .then((confirmationResult) => {
        // SMS sent. Prompt user to type the code from the message, then sign the
        // user in with confirmationResult.confirm(code).
        window.confirmationResult = confirmationResult;
        // ...
        
        }).catch((error) => {
            alert('signInError:'+error);
            grecaptcha.reset(appVerifier.RecaptchaVerifier);
        });
    
    
}

var waitTime = 10;
function time(ele) {
    if(waitTime == 0) {
        ele.disabled=false;
        ele.innerHTML="取得驗證碼";
        waitTime = 10;
    }
    else {
        ele.disabled=true;
        ele.innerHTML=waitTime+ "秒後可以重新發送";
        waitTime-=1;
        setTimeout(function() {
            time(ele)
        }, 1000)
    }
}
    
function onConfirmClick() {
    const code = document.getElementById('auth_code').value;
    confirmationResult.confirm(code).then((result) => {
        // User signed in successfully.
        const user = result.user;
        document.getElementById('confirm_status').value="驗證成功";
        alert('驗證成功');
    }).catch((error) => {
        document.getElementById('confirm_status').value="驗證失敗";
        alert('驗證失敗： 驗證碼輸入錯誤');
    });
}

function checkFormData() {
    var cAccount = document.getElementById("customer_account");
    var cPassword = document.getElementById("customer_password");
    var cCPassword = document.getElementById("confirm_password");
    var cName = document.getElementById("customer_name");
    var cEamil = document.getElementById("customer_email");
    var cPhone = document.getElementById("customer_tel");
    var cAuthCode = document.getElementById("auth_code");
    var cAuthStatus = document.getElementById("confirm_status");

    if (cAccount.value == "") {
        alert("請輸入帳號!");
        return false
    }

    if (cPassword.value == "") {
        alert("請輸入密碼!");
        return false
    }

    if (cCPassword.value == "") {
        alert("請在確認密碼欄再次輸入密碼!");
        return false
    }

    if (cName.value == "") {
        alert("請輸入姓名!");
        return false
    }

    if (cEamil.value == "") {
        alert("請輸入電子信箱!");
        return false
    }

    if (cPhone.value == "") {
        alert("請輸入手機號碼!");
        return false
    }

    if (cAuthCode.value == "") {
        alert("請輸入驗證碼!");
        return false
    }

    if (cAuthStatus.value == "未驗證") {
        alert("請驗證手機號碼!");
        return false
    }

    if (cAuthStatus.value == "驗證失敗") {
        alert("請再次檢查驗證碼是否輸入正確!或者重新整理後再次取得驗證碼!");
        return false
    }

    if(cPassword.value != cCPassword.value) {
        alert('密碼欄與確認密碼欄不相符!請再次確認是否輸入正確!')
        return false
    }
}