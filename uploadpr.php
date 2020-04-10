<!DOCTYPE>
<html>
    <head></head>
    <body>
        <div id="content"><form method="post" action="savepr.php" enctype="multipart/form-data">
                <input type="hidden" name="size" value="1000000">
                <div>
                    <input type="file" name="image">
                </div>
                <div>
                    
                    Titlu:<input type='text' name="text" placeholder="bla bla">
                </div>
                Pret(in $):<input type='text' name="price" placeholder="bla bla"
                <br>
                 <div>
                   Descriere: <textarea name="descr" cols="40" rows="4" placeholder="bla bla"></textarea>
                </div>
                 <div>
                   Keywords: <textarea name="keywords" cols="40" rows="4" placeholder="bla bla"></textarea>
                </div>
                <div>
                    <input type="submit" name="upload" value="Upload Image">
                </div>
            </form>
        </div>
    </body>
</html>