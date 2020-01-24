<?php
//Markdown::indexAction();
$markdown = file_get_contents("Issue20190723.md"); #读取指定目录下的README.md文件
//$markdown = json_encode($markdown,JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT); #将获取到的内容转化成JSON

?>
<!DOCTYPE html>
<html lang="zh">
    <head>
        <meta charset="utf-8" />
        <title>TOC - Editor.md examples</title>
        <link rel="stylesheet" href="css/style.css" />
        <link rel="stylesheet" href="../css/editormd.css" />
        <link rel="shortcut icon" href="https://pandao.github.io/editor.md/favicon.ico" type="image/x-icon" />
        <style>            
            #custom-toc-container {
                border: 1px solid #ddd;
                width: 90%;
                margin: 0 auto 15px;
                overflow: visible;
            }
            
            #custom-toc-container > .markdown-toc {
                padding: 10px;
            }
        </style>
    </head>
    <body>
        <div id="layout">
            <header>
                <h1>TOC (Table of Contents) example</h1>
            </header>
            <div class="btns">
                <button id="insert-btn">ToC insert to custom container</button>
                <button id="menu-btn">ToC Dropdown menu</button>
                <button id="menu2-btn">ToC Dropdown menu insert to custom container</button>
                <button id="default-btn">Default</button>
                <button id="tocm-btn">Enable [TOCM]</button>
            </div>
            <div class="markdown-body editormd-preview-container" id="custom-toc-container">#custom-toc-container</div>
            <div id="test-editormd">                
                <textarea style="display:none;">
					<?php echo $markdown; ?>
				</textarea>
            </div>
        </div>
        
        <script src="js/jquery.min.js"></script>
        <script src="../editormd.js"></script>   
        <script type="text/javascript">            
            var testEditor;
                
            $(function() {
                testEditor = editormd("test-editormd", {
                    width         : "90%",
                    height        : 720,
                    path          : "../lib/",
                    //toc           : false,         // diable ToC
                    tocStartLevel : 2      // Parse beginning of H2, Default value 1
                });
                
                $("#insert-btn").click(function() {
                    testEditor.config({
                        tocContainer : "#custom-toc-container",
                        tocDropdown   : false
                    });
                });
                
                $("#menu-btn").click(function(){
                    testEditor.config({
                        tocContainer  : "",
                        tocDropdown   : true,
                        tocTitle      : "目录 Table of Contents dsfsadfsfdsdf",
                    });
                });
                
                $("#menu2-btn").click(function(){
                    testEditor.config({
                        tocContainer  : "#custom-toc-container",
                        tocDropdown   : true,
                        tocTitle      : "目录 Table of Contents dsfsadfsfdsdf",
                    });
                });
                
                $("#default-btn").click(function() {
                    $("#custom-toc-container").html("#custom-toc-container");
                    testEditor.config({
                        tocContainer : "",
                        tocm : false,
                        tocDropdown  : false
                    });
                });
                
                $("#tocm-btn").click(function() {
                    $("#custom-toc-container").html("#custom-toc-container");
                    testEditor.config({
                        tocm : true,
                        tocContainer : "",
                        tocDropdown   : false
                    });
                });
            });
        </script>
    </body>
</html>