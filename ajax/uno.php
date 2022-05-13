<?php
function foo() { return "foo"; }
function bar() { return "bar"; }

switch($_POST['functionName']) {
    case 'foo': echo foo(); break;
    case 'bar': echo bar(); break;
}
?>