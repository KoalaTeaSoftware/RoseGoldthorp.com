<?
require_once("httpHelper.class.php");

/**
 * Class TalkerToClient
 *
 * Use of these methods will result in output, including headers, being sent from the server to the requester
 */
class TalkerToClient
{
    protected $myHttpHelper;

    function __construct()
    {
        $this->myHttpHelper = new httpHelper;
    }

    /**
     * @param $status - the code to be sent back to the requester
     * @param $data - a data object - this will be json encoded and added to the response
     */
    function sendJson($status, $data)
    {
        error_log("Sending Json");
        error_log("Item to send is");
        error_log(print_r($data, true));
        error_log("busked-up is");
        error_log(json_encode($data, JSON_UNESCAPED_SLASHES), true);

        $this->sendCommonHeaders($status);
        header('Content-Type: application/json');
        echo json_encode($data, JSON_UNESCAPED_SLASHES);
    }

    /**
     * Provide the various headers that are always sent to the user, no matter what the response
     * NOTE: this is not a public thing
     *
     * @param $status - the http status to be sent
     */
    protected function sendCommonHeaders($status)
    {
        header("HTTP/1.0 " . $status . " " . $this->myHttpHelper->getStatusText($status));
        header("Access-Control-Allow-Origin: *");
//        header("Expires: Sat, 1 Apr 2018 00:00:01 GMT");
        header("Last-Modified: " . gmdate("D, d M y H:i:s") . " GMT");
        header("Cache-Control: no-cache, must-revalidate");
        header("Pragma: no-cache");
    }

    /////////////////////////////////////////////////////////////////////////////////////////////////////
//    function sendProofItem($mimeType, $fileName, $data)
//    {
//        // expect: A string to use as the mime type, content as a string
//        // if doing this, assume that it is a successful thing
//        $this->sendCommonHeaders(200);
//        //header( 'Content-Disposition: filename="' . dogbreath  . '"' );
//        header('Content-Type: ' . $mimeType);
//        header("Access-Control-Allow-Origin: *");
//        echo $data;
//    }

    /**
     * @param $status - the code to be sent back to the requester
     * @param $data - a plain-text string to be sent back to the user
     */
    function sendPlain($status, $data)
    {
        $this->sendCommonHeaders($status);
        header('Content-Type: text/plain');
        echo $data;
    }
}
