<?

/**
 * Class FileSystemHelper
 *
 * Some methods to hide-up some rather common activities
 */
class FileSystemHelper
{
    /**
     * @param $code -  a number obtained when you have tried to upload a file
     * @return string -  a human-readable string version of the code
     */
    function getFileUploadErrorMessage($code)
    {
        switch ($code) {
            case UPLOAD_ERR_INI_SIZE:
                return "The uploaded file exceeds the upload_max_filesize directive in php.ini";
            case UPLOAD_ERR_FORM_SIZE:
                return "The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form";
            case UPLOAD_ERR_PARTIAL:
                return "The uploaded file was only partially uploaded";
            case UPLOAD_ERR_NO_FILE:
                return "No file was uploaded";
            case UPLOAD_ERR_NO_TMP_DIR:
                return "Missing a temporary folder";
            case UPLOAD_ERR_CANT_WRITE:
                return "Failed to write file to disk";
            case UPLOAD_ERR_EXTENSION:
                return "File upload stopped by extension";

            default:
                return "Unknown upload error";
        }
    }

    /**
     * remove all files in the given directory
     * this is OK for the moment, when there will only be a single user
     * if there is more thn one user, perhaps purge all files older that 5 mins
     *
     * @param $root - everything in here will be deleted
     */
    function purgeDir($root)
    {
        $list = glob($root . "/*");
        error_log("Purging dir: " . $root . " of these files: " . print_r($list, TRUE));
        foreach ($list as $filename) {
            if (unlink($filename)) error_log("Removed: " . $filename);
            else error_log("Failed to remove: " . $filename);
        }
    }

    /**
     * You can't always rely on the mime type of the uploaded file. This asks the server's file system to have a look at the file
     *
     * @param $tmpname - the fill name of a file
     * @return mixed - a string telling you what the mime type of the specific file is
     */
    function sniffFileType($tmpname)
    {
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mtype = finfo_file($finfo, $tmpname);
        finfo_close($finfo);
        return $mtype;
    }

    /**
     * This appears to be a legacy verification arrived at through experimentation
     * Basically, the mime-types listed have been found to upload correctly, and the others to be corrupted in some way
     *
     * @param $mtype
     * @return bool
     */
    function mimeTypeIsValid($mtype)
    {
        if (
            // testing has shown that these ones come back out corrupted in some way - don't know why / how
            //$mtype == ( "application/vnd.openxmlformats-officedocument.wordprocessingml.document" ) ||
            $mtype == ("application/vnd.ms-excel") ||
            $mtype == ("application/vnd.openxmlformats-officedocument.spreadsheetml.sheet") ||
            // just leave these out until it proves necessary to have them
            //$mtype == ( "application/vnd.ms-powerpoint" ) ||
            //$mtype == ( "application/vnd.openxmlformats-officedocument.presentationml.presentation" ) ||
            $mtype == ("application/pdf") ||
            $mtype == ("application/xml") ||
            $mtype == ("application/msword") ||
            $mtype == ("image/jpeg") ||
            $mtype == ("image/png") ||
            $mtype == ("image/tiff") ||
            $mtype == ("image/gif") ||
            $mtype == ("image/*") ||
            $mtype == ("text/plain") ||
            $mtype == ("text/html")
        ) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}
