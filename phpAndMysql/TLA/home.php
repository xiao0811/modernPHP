<?php
/**
 * Created by PhpStorm.
 * User: 骁傻
 * Date: 2018-5-7
 * Time: 16:01
 */

require_once "page.php";

$homepage = new Page();
$homepage->content = "
    <!-- page content -->
    <section>
    <h2>Welcome to the home of TLA Consulting.</h2>
    <p>Please take some time to get to know us.</p>
    <p>We specialize in serving your business needs 
    and hope to hear form you soon.</p>
    </section>
";

$homepage->Display();
