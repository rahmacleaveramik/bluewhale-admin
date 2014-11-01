<?php

if ( !isset($_REQUEST['term']) )
    exit;

$dblink = mysql_connect('localhost', 'root', '') or die( mysql_error() );
mysql_select_db('db_repository');

$rs = mysql_query('select npm, nama from tb_mhs where nama like "'. mysql_real_escape_string($_REQUEST['term']) .'%" OR npm like "'. mysql_real_escape_string($_REQUEST['term']) .'%" order by nama asc limit 0,10', $dblink);

$data = array();
if ( $rs && mysql_num_rows($rs) )
{
    while( $row = mysql_fetch_array($rs, MYSQL_ASSOC) )
    {
        $data[] = array(
            'label' => $row['npm'] .', '. $row['nama'] ,
            'value' => $row['npm']
        );
    }
}

echo json_encode($data);
flush();

