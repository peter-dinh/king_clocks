<?php
	
?>
<div id="adminmenuwrap">
    <ul id="adminmenu">
       <?php

			$menu_admin = List_Menu_Admin();
            
			while($row = mysqli_fetch_array($menu_admin))
			{
				ob_start();
		?>
        <li>
            <p><img src="{img}" height="20px"/><a href="{url}"> {name}</a></p>
        
        	<ul class="menu_con">
               		<?php
						$menu_sub = List_Menu_Sub($row["id"]);
                        if(mysqli_num_rows($menu_sub)!=0)
                        {
    						while($row1 = mysqli_fetch_array($menu_sub))
    						{
    							ob_start();
					?>
                	<li><a href="{url_sub}">{name_sub}</a></li>
                	<?php
    							$s = ob_get_clean();
    							$s = str_replace("{url_sub}",$row1["url"],$s);
    							$s = str_replace("{name_sub}",$row1["name"],$s);
    							echo $s;
    						}
                        }
					?>
            </ul>
        </li>
        <?php

				$str = ob_get_clean();
				$str = str_replace("{url}",$row["url"],$str);
				$str = str_replace("{name}",$row["name"],$str);
				$str = str_replace("{img}", $row["img"],$str);
				echo $str;
			}
		?>
    </ul>
</div>


