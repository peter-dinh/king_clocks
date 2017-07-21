

<div id="head-link">
    <div id="menu1">
      <ul>
        <?php
            $menu_top = List_Menu_Top();
            while($row_top = mysqli_fetch_array($menu_top))
            {
                ob_start();
            
        ?>
        <li><a href="index.php?menu={url}">{name}</a></li>
        <?php
                $str = ob_get_clean();
                $str = str_replace("{url}", $row_top["url"], $str);
                $str = str_replace("{name}", $row_top["name"], $str);

                echo $str;
            }
        ?>
      </ul>
    </div>
</div>
<?php

?>