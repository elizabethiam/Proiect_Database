<!DOCTYPE>
<html>
    <head></head>
    <body>
        <div id="content"><form method="post" action="saveXML.php" enctype="multipart/form-data">
                <input type="hidden" name="size" value="1000000">
                ID:<input type="text" size="20" name="id">
                <div>
                 Description: <input type = "text" size="20" name = "descr">
                </div>
                <div>
                    <input type="file" name="image">
                </div>
                <div>
                 Price:<input type="text" size="20" name="price">
                </div>
<div>
<input type="submit" name="upload" value="Upload Image">
                </div>
            </form>
        </div>
    </body>
</html>

