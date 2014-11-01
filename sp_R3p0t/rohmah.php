<?php

if ( !isset($_REQUEST['term']) )
    exit;

$dblink = mysql_connect('localhost', 'root', '') or die( mysql_error() );
mysql_select_db('db_repository');

$rs = mysql_query('select npm, judul from tb_tugasakhir where npm like "'. mysql_real_escape_string($_REQUEST['term']) .'%" OR judul like "'. mysql_real_escape_string($_REQUEST['term']) .'%" order by npm asc limit 0,10', $dblink);

$data = array();
if ( $rs && mysql_num_rows($rs) )
{
    while( $row = mysql_fetch_array($rs, MYSQL_ASSOC) )
    {
        $data[] = array(
            'label' => $row['npm'] .', '. $row['judul'] ,
            'value' => $row['npm']
        );
    }
}

echo json_encode($data);
flush();

