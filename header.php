<!-- <?php
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}
if (isset($_SESSION["user_id"])) $userid = $_SESSION["user_id"];
else $userid = "";
if (isset($_SESSION["user_name"])) $username = $_SESSION["user_name"];
else $username = "";
if (isset($_SESSION["user_level"])) $userlevel = $_SESSION["user_level"];
else $userlevel = "";
?> -->


<div class="top1">
    <div class="top1-1">
        <span><img class="top1-1_icon" src="http://<?= $_SERVER['HTTP_HOST'] ?>/solid/img/logo1.svg" /></span>
        <ul class="top1-1table">
            <li class="top1-1tabletd"><a href="http://<?= $_SERVER['HTTP_HOST'] ?>/solid/coin/coin.php">거래소</a>
            </li>
            <li class="top1-1tabletd">
                <a href="http://<?= $_SERVER['HTTP_HOST'] ?>/solid/notice/notice.php">공지사항</a>
            </li>
            <li class="top1-1tabletd"><a href="http://<?= $_SERVER['HTTP_HOST'] ?>/solid/wallet/wallet.php">자산</a></li>
            <li class="top1-1tabletd"><a href="http://<?= $_SERVER['HTTP_HOST'] ?>/solid/service/service.php">1:1문의</a>
            </li>
        </ul>
    </div>
    <div class="top1-2">
        <ul class="top1-2table">
            <?php
			if (!$userid) {
                ?>

            <li class="top1-2tabletd"><a
                    href="http://<?= $_SERVER['HTTP_HOST'] ?>/solid/member/member_form.php">회원가입</a></li>
            <li class="top1-2tabletd"><a href="http://<?= $_SERVER['HTTP_HOST'] ?>/solid/login/login_form.php">로그인</a>
            </li>
            <li class="top1-2tabletd"></li>
            <?php
			} else {
				$logged = $username . "(" . $userid . ")님 환영합니다.";
			?>
            <li><?= $logged ?></li>
            <li class="top1-2tabletd">
                < href="http://<?= $_SERVER['HTTP_HOST'] ?>/solid/admin/admin_members.php">쪽지함
            </li>
            <?php
			}
            if ($userid && $userlevel == 1) { ?>
            <li class="top1-2tabletd">
                < class="top1-2tabletd" href="http://<?= $_SERVER['HTTP_HOST'] ?>/solid/login/logout.php">로그아웃
            </li>

            <?php
			} else if ($userid) {
			?>
            <li class="top1-2tabletd"><a href="http://<?= $_SERVER['HTTP_HOST'] ?>/solid/login/logout.php">로그아웃
            </li>
            <?php
			}
			?>
        </ul>
    </div>
</div>