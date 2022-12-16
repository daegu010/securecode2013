<div class="row">
    <div class="col">
        <h5 class="text-primary">
            <span class="material-icons">lock</span>
            로그인</h5>
    </div>
</div>

<script>
    function checkError()
    {
        
        var regexp = /^[a-zA-Z0-9]{4,10}$/;
        if(!regexp.test(document.loginForm.secureid.value))
        {
            alert('아이디는 영문 대소문자, 숫자로 4~10글자만 가능합니다.');
            document.loginForm.id.focus();
            return false;
        }
        
        regexp = /^[a-zA-Z0-9]{3,10}$/;
        if(!regexp.test(document.loginForm.securepass.value))
        {
            alert('비밀번호는 영문 대소문자, 숫자로 3~10글자만 가능합니다.');
            document.loginForm.pass.focus();
            return false;
        }

        
        let secureid = document.querySelector('#secureid').value;
        let securepass = $('#securepass').val();
        
        let idsave = $('#idsave').is(':checked');
        let passsave = $('#passsave').is(':checked');
        // let idsave = document.getElementById('idsave').checked
      
        if(idsave == true)
        {
            alert('1');
            setCookie('secureid', secureid, 31);
        }else
        {
            alert('2');
            setCookie('secureid', secureid, 0);
        }

        if(passsave == true)
        {
            alert('3');
            setCookie('securepass', securepass, 31);
        }else
        {
            alert('4');
            setCookie('securepass', securepass, 0);
        }

    }
</script>


<form name="loginForm" method="post" onSubmit="return checkError()"  action="main.php?cmd=login">
<div class="row">
    <div class="col-2">ID </div>
    <div class="col-1">
        <input type="checkbox" name="idsave" id="idsave">
    </div>
    <div class="col">
        <input type="text" class="form-control" name="secureid" id="secureid" placeholder="아이디 입력">
    </div>
</div>
<div class="row">
    <div class="col-2">비밀번호 </div>
    <div class="col-1">
        <input type="checkbox" name="passsave" id="passsave">
    </div>
    <div class="col">
        <input type="password" class="form-control" name="securepass" id="securepass" placeholder="비밀번호 입력">
    </div>
</div>
<div class="row">
    <div class="col text-center">
        <button type="submit" class="btn btn-primary btn-sm">로그인</button>
    </div>
</div>
</form>
<script>
    getCookieIfSaveOld();
</script>