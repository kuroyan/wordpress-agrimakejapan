<?php
 
  // 製品名（検索キーワード）
  $product_name = isset($_GET['keyword']) ? $_GET['keyword'] : "";
 
  // 検索結果メッセージ
  $message = ( isset($_GET['keyword']) && (!$product_name) ) ? "製品名を入力してください。" : "";
 
 
  // wpdbオブジェクト
  global $wpdb;
 
  // ★デバッグ用
  $wpdb->show_errors();
  
  $rows ="";
 
  // キーワードが設定されているとき
  if ($product_name) {
 
    // SQL
    $sql = $wpdb->prepare("SELECT p.name, p.price FROM $wpdb->test p WHERE p.name LIKE %s", '%'.$product_name.'%' );

    // クエリ実行
    $rows = $wpdb->get_results($sql);
 
    // 検索結果メッセージ
    $message = (!$rows) ? "該当する製品が見つかりませんでした。" : count($rows)."件の製品が見つかりました。";
  }
  ?>
  
 <!-- 製品価格検索フォーム -->
<form class="" id="" role="search" action="./" method="get">
  <div>
 
    <!-- キーワード入力欄 -->
    <label for="search_box">製品名検索</label>
    <input class="" id="search_box" type="text" name="keyword" placeholder="" value="<?php echo $product_name; ?>" />
 
    <!-- ボタン -->
    <input id="price-search-button" class="searchsubmit" type="submit" value="検索する" />
 
  </div>
</form>
 
<!-- 検索結果メッセージ -->
<p>
<?php echo $message; ?>
</p>  
<?php
  // 製品価格を表示
  if($rows){
	
	echo "<table class='sasaki' align='center'>";
	  foreach ($rows as $row) {
		  echo"<tr>";
          $pr = $row->price;
		  $prv = number_format($pr);
		  echo "<td>".$row->name."</td><td>".$prv."円</td>";
		  echo "</tr>";
	  }
	echo "</table>";
  }
?>