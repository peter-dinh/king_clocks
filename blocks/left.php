<div id="left">
    <div id="danhmuc">
        <div id="menu2">
        <div class="div_title">
        <h2>Các sản phẩm</h2>
        </div>
            <ul>
                <?php
                    $menu_left = List_Menu_Left();
                    while($row = mysqli_fetch_array($menu_left))
                    { 
                        ob_start();
                ?>
                <li><a href="index.php?menu={url}">{name}</a></li>

                <?php
                        $str = ob_get_clean();
                        $str = str_replace("{url}", $row["url"], $str);
                        $str = str_replace("{name}", $row["name"], $str);
                        echo $str;
                    }
                ?>
            </ul>
        </div>
    </div>
    <div id="baner">
        <div class="div_title">
            <h2>Quảng Cáo</h2>
        </div>
        <table>
            <tr>
                <td>
                    <a href=""><img src="upload/quangcao/ao le xanh alx04.jpg" width="185px"/></a>
                </td>
            </tr>
            <tr>
                <td>
                <a href="#"><img src="upload/quangcao/lazada-1111.jpg" width="185px" /></a>
                </td>
            </tr>
            <tr>
                <td>
                <a href="#"><img src="upload/quangcao/wordpress-hosting-banner.jpg" width="185px" /></a>
                </td>
            </tr>
        </table>
    </div>
</div>