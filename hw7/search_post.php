<?php
   // config for connect database 
   $connect = mysqli_connect("localhost", "root", "", "songhw7"); 

function fill_music($connect){
    if (isset($_POST['search'])) {
        $search = $_POST['search'];
    } else {
        $search = '';
    }
    if (isset($_POST['type'])) {
        $type = $_POST['type'];
    } else {
        $type = '';
    }

    if($type !=0){
        $sql = "SELECT music.MusicName,music.Lyrics, artist.BandName, album.AlbumName,album.ReleaseYear
        FROM ((music
        INNER JOIN artist ON music.BandID = artist.BandID)
        INNER JOIN album ON music.AlbumID = album.AlbumID)
        WHERE album.AlbumID LIKE '%$type%'";
    }else{
        $sql = "SELECT music.MusicName,music.Lyrics, artist.BandName, album.AlbumName,album.ReleaseYear
        FROM ((music
        INNER JOIN artist ON music.BandID = artist.BandID)
        INNER JOIN album ON music.AlbumID = album.AlbumID)
        WHERE MusicName LIKE '%$search%' or artist.BandName LIKE '%$search%'";
    }

    $result = mysqli_query($connect, $sql);

    $arr = array();

    while($row = $result->fetch_object())
    {
         $arr[] = $row;
    }
    echo json_encode($arr,JSON_UNESCAPED_UNICODE);
}
    echo fill_music($connect);
?>    




