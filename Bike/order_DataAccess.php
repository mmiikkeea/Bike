<?
// 程式範例：order_DataAccess.php
class DataAccess {  // DataAccess類別宣告
   private $link;   // 資料庫連結物件
   private $result; // 查詢結果物件
   public $affected_rows;  // 影響的記錄數
   public $num_fields;     // 欄位數
   public $num_rows;       // 記錄數
   // 建構子
   function __construct($host, $user, $pass, $db) {
      // 建立資料庫連結
      $this->link=mysqli_connect($host,$user,$pass,$db);
   }
   // 解構子
   function __destruct() {
      if (is_object($this->result)) // 釋放佔用的記憶體
         mysqli_free_result($this->result); 
      mysqli_close($this->link);  // 關閉資料庫連結
   }
   // 執行SQL查詢
   function fetchDB($sql) {
      // 送出Big5編碼的MySQL指令
      mysqli_query($this->link,'SET CHARACTER SET utf8');
      mysqli_query($this->link, 
        "SET collation_connection = 'utf8_general_ci'");
      // 送出查詢的SQL指令
      $this->result = mysqli_query($this->link, $sql);
      // 取得影響的記錄數
      $this->affected_rows = mysqli_affected_rows(
                             $this->link);
      if ( is_object($this->result) ) { // 是否是物件
         // 取得欄位數
         $this->num_fields=mysqli_num_fields($this->result);
         // 取得記錄數
         $this->num_rows=mysqli_num_rows($this->result);
      }
   }
   // 取得查詢結果一筆記錄到結合陣列
   function getRecord() {
      if ( $row = mysqli_fetch_array($this->result, 
                                    MYSQLI_ASSOC) )
         return $row;    // 傳回結合陣列
      else
         return false;
   }   
}
?>