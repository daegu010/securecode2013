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
        if(!regexp.test(document.loginForm.id.value))
        {
            alert('아이디는 영문 대소문자, 숫자로 4~10글자만 가능합니다.');
            document.loginForm.id.focus();
            return false;
        }

        regexp = /^[a-zA-Z0-9]{3,10}$/;
        if(!regexp.test(document.loginForm.pass.value))
        {
            alert('비밀번호는 영문 대소문자, 숫자로 3~10글자만 가능합니다.');
            document.loginForm.pass.focus();
            return false;
        }
    }
</script>


<form name="loginForm" method="post" onSubmit="return checkError()"  action="main.php?cmd=login">
<div class="row">
    <div class="col-2">ID </div>
    <div class="col">
        <input type="text" class="form-control" name="id" placeholder="아이디 입력">
    </div>
</div>
<div class="row">
    <div class="col-2">비밀번호 </div>
    <div class="col">
        <input type="password" class="form-control" name="pass" placeholder="비밀번호 입력">
    </div>
</div>
<div class="row">
    <div class="col text-center">
        <button type="submit" class="btn btn-primary btn-sm">로그인</button>
    </div>
</div>
</form>