<?php
/**
*  
*/
class pagination
{
	protected $khoitao = array(
			'tranghientai' => 1,
			'tongsobai' => 1,
			'tongsotrang' => 1,
			'limit' => 10,
			'strat' => 0,
			'link_full' =>'',
			'link' => '',
		);
	function init($array1 = array())
	{
		foreach ($array1 as $key => $value) {
			if(isset($this ->khoitao[$key]))
				$this ->khoitao[$key] = $value;
		}

		if($this->khoitao['limit']<0)
			$this ->khoitao['limit'] = 0;

		$this->khoitao['tongsotrang'] = ceil($this->khoitao['tongsobai']/$this ->khoitao['limit']);

		if ($this->khoitao['tongsotrang'] <= 0){
            $this->khoitao['tongsotrang'] = 1;
        }

        if($this->khoitao['tranghientai'] < 1)
        {
        	$this->khoitao['tranghientai'] = 1;
        }
        if($this->khoitao['tranghientai'] > $this->khoitao['tongsotrang'])
        {
        	$this->khoitao['tranghientai'] = $this->khoitao['tongsotrang'];
        }

        $this->khoitao['start'] = ($this->khoitao['tranghientai'] - 1)* $this->khoitao['limit'];

	}

	private function getlink($page)
	{
		if($page < 1)
		{
			return $this->khoitao['link'];
		}
		return str_replace('{page}', $page, $this->khoitao['link_full']);
	}

	function list_page()
	{
		$html ='';
		if($this->khoitao['tongsobai'] > $this->khoitao['limit'])
		{
			if($this->khoitao['tranghientai'] > 1)
			{
				$html .= '<li><a href="'.$this->getlink('1').'">First</a></li>';
				$html .= '<li><a href="'.$this->getlink($this->khoitao['tranghientai'] - 1).'" >Prev</a></li>';
			}
			for($i = 1; $i <= $this->khoitao['tongsotrang']; $i++)
			{
				if($this->khoitao['tranghientai'] == $i)
				{
					$html .= '<li><span class="current">'.$i.'</span></li>';
				}
				else
				{
					$html .= '<li><a href="'.$this->getlink($i).'">'.$i.'</a></li>';
				}
			}

			if($this->khoitao['tranghientai']<$this->khoitao['tongsotrang'])
			{
				$html .= '<li><a href="'.$this->getlink($this->khoitao['tranghientai'] + 1).'">Next</a></li>';
				$html .= '<li><a href="'.$this->getlink($this->khoitao['tongsotrang']).'" >Last</a></li>';
			}
		}

		return $html;
	}

	function get_page()
	{
		return $this->khoitao['tranghientai'];
	}
	function get_total()
	{
		return $this->khoitao['tongsobai'];
	}

}

?>