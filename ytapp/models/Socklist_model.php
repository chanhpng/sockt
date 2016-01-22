<?php class Socklist_model extends CI_Model {
        //public $query;

        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
        }

        public function getSockList($type,$limit,$offset)
        {
			if($type=='')
			{
				$sql = "SELECT * FROM socklists LIMIT ? OFFSET ?";
				$query = $this->db->query($sql, array(intval($limit),intval($offset)));
			}
			else
			{
				$sql = "SELECT * FROM socklists WHERE _type=? LIMIT ? OFFSET ?";
				$query = $this->db->query($sql, array($type,intval($limit),intval($offset)));
				
			}
            return $query->result();
        }
		public function saveSockList($type,$arrSock)
		{
			$success = 0;
			$error = 0;
			//--- fix timezone 
			if( ! ini_get('date.timezone') )
			{
				date_default_timezone_set('GMT');
			}
			foreach ($arrSock as $sock) {
				$sock = preg_replace("/[^0-9.:]/", '', $sock);
				/*if ( ! filter_var($sock, FILTER_VALIDATE_IP))
				{
					$error++;
				}
				else
				{
					
				}*/
				
				//--------------------
				$this->db->where('_ipv4',$sock); 
				$q = $this->db->get('socklists');  
				if ( $q->num_rows() > 0 )  { 
					$data = array(
						'_type' => $type,
						'_actived' => 'Y',
						'_dateadd' => date('Y-m-d H:i:s')
					);
					$this->db->where('_ipv4',$sock); 
					if($this->db->update('socklists',$data))
					{
						$success++;
					}
					else
					{
						$error++;
					} 
				} 
				else 
				{ 
					$data = array(
						'_ipv4' => $sock,
						'_ipv6' => '',
						'_type' => $type,
						'_actived' => 'Y',
						'_dateadd' => date('Y-m-d H:i:s')
					);
					if($this->db->insert('socklists', $data))
					{
						$success++;
					}
					else
					{
						$error++;
					} 
				}
				
				//--------------------
				
			} 
			$data = array(
				'success' => $success,
				'error' => $error
			);
			return $data;
		}
}
?>