<div class="row">
    <div class="col">
        <h5 class="text-primary">
            <span class="material-icons">lock</span>
            로그인</h5>
    </div>
</div>
<form name="loginForm" method="post" action="main.php?cmd=login">
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