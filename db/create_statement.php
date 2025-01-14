<?php
include $_SERVER['DOCUMENT_ROOT'] . "/solid/db/db_connector.php";
include $_SERVER['DOCUMENT_ROOT'] . "/solid/db/create_table.php";
include $_SERVER['DOCUMENT_ROOT'] . "/solid/db/create_procedure.php";
include $_SERVER['DOCUMENT_ROOT'] . "/solid/db/create_trigger.php";
include $_SERVER['DOCUMENT_ROOT'] . "/solid/db/init_table.php";

create_table($con, "members");
create_table($con, "deleted_members");
create_table($con, "coin_info");
create_table($con, "favorite_coin");
create_table($con, "recruit_plan");
create_table($con, "purchase");
create_table($con, "notice");
create_table($con, "free");
create_table($con, "free_ripple");
create_table($con, "faq");
create_table($con, "faq_ripple");
create_table($con, "question");
create_table($con, "question_ripple");
create_table($con, "memo");

insert_init_data($con, 'recruit_plan');

create_procedure($con, 'members_procedure');
create_procedure($con, 'notice_procedure');
//create_procedure($con, 'notice_procedure');
//create_procedure($con, 'faq_procedure');
//create_procedure($con, 'question_procedure');
//create_procedure($con, 'free_procedure');

create_trigger($con, 'deleted_members');
// drop_procedure_scheduler($con);
?>