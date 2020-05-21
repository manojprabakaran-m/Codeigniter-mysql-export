
/* generate db backup */
  public function get_db_backup($key_id = null)
  {
    $file_path = time() . $key_id . ".sql";
    $fileuploaddire = './resource/sql_backup';
    $directory = base_url('resource/sql_backup/'); 
    if (!is_dir($fileuploaddire)) {
      mkdir($fileuploaddire, 0777, true);
    }
    $file_name =   $key_id . "_" . SITE_NAME . "_" . time() . ".sql"; 
    $file_path = $fileuploaddire . "/" . $file_name;
    // Load the DB utility class
    /*$this->load->dbutil();

    // Backup your entire database and assign it to a variable
    $backup = &$this->dbutil->backup();

    // Load the file helper and write the file to your server

    $this->load->helper('file');

    write_file($file_path, $backup);

    // Load the download helper and send the file to your desktop

    $this->load->helper('download');

  force_download($file_name, $backup);*/
    $this->load->dbutil();
    $prefs = array(
      'format' => 'zip',
      'filename' => $file_name
    );
    $backup = $this->dbutil->backup($prefs);
    $db_name = $key_id . "_" . SITE_NAME . "_" . date("Y-m-d-H-i-s") . '.zip';
    $save = $fileuploaddire . "/" . $db_name;
    $this->load->helper('file');
    //echo $save;
    write_file($save, $backup);
    //$this->load->helper('download');
    //force_download($db_name, $backup);
  }
