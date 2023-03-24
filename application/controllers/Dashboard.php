<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model('Blueprint');
		$this->load->model('Sobad_project');
		$this->load->model('Sobad_project_detail');
		$this->load->model('Sobad_module');
		$this->load->model('Sobad_group_post');
	}

	public function array_job_team()
	{
		$data = [
			'project_id',
			'notes',
			'reff_note',
			'priority',
			'leader_id',
			'due_date',
			'progress',
			'status',
			'user',
		];
		return $data;
	}
	public function ajax_proccess()
	{
		// AJAX IMAGE CAROUSEL
		$data = '';
		$data = json_encode($data);
		$url  = base_url('Dashboard/ajax_image_carousel');
		$type = 'POST';
		$respon = '#image_carousel';
		ajax($url, $type, $data, $respon);

		// AJAX WAITING For Confirm
		// ============================================= 
		$data = '';
		$data = json_encode($data);
		$url  = base_url('Dashboard/ajax_count_waiting_job');
		$type = 'POST';
		$respon = '#count_request';
		ajax($url, $type, $data, $respon);

		$data = '';
		$data = json_encode($data);
		$url  = base_url('Dashboard/ajax_table_waiting_job');
		$type = 'POST';
		$respon = '#waiting_job';
		ajax($url, $type, $data, $respon);

		// ============================================================
		// ************************************************************
		// ============================================================

		// AJAX BUBLE CHART
		// ============================================= 
		$data = '';
		$data = json_encode($data);
		$url  = base_url('Dashboard/ajax_bublechart');
		$type = 'POST';
		$respon = '#buble_chart';
		ajax($url, $type, $data, $respon);

		$data = '';
		$data = json_encode($data);
		$url  = base_url('Dashboard/count_bublechart');
		$type = 'POST';
		$respon = '#count_bublechart';
		ajax($url, $type, $data, $respon);
		// ============================================================
		// ************************************************************
		// ============================================================

		// AJAX JOB ON OTHER DPARTEMENT
		// ============================================= 
		$data = '';
		$data = json_encode($data);
		$url  = base_url('Dashboard/ajax_job_other_dpartment');
		$type = 'POST';
		$respon = '#job_other_dpartement';
		ajax($url, $type, $data, $respon);

		$data = '';
		$data = json_encode($data);
		$url  = base_url('Dashboard/ajax_count_job_other_dpartment');
		$type = 'POST';
		$respon = '#count_job_other';
		ajax($url, $type, $data, $respon);

		// ============================================================
		// ************************************************************
		// ============================================================

		// AJAX JOB TEAM ONE 
		// ============================================= 
		$data = [
			'user_id' 	=> 25, // Charles
			'column'	=> $this->array_job_team()
		];
		$data = json_encode($data);
		$url  = base_url('Dashboard/ajax_job_one');
		$type = 'POST';
		$respon = '#job_team_one';
		ajax($url, $type, $data, $respon);

		$data = [
			'user_id' 	=> 25, // Charles
			'column'	=> $this->array_job_team()
		];
		$data = json_encode($data);
		$url  = base_url('Dashboard/ajax_count_job_one');
		$type = 'POST';
		$respon = '#count_job_one';
		ajax($url, $type, $data, $respon);

		// AJAX JOB TEAM TWO 
		// ============================================= 
		$data = [
			'user_id' 	=> 83, // Berlin
			'column'	=> $this->array_job_team()
		];
		$data = json_encode($data);
		$url  = base_url('Dashboard/ajax_job_two');
		$type = 'POST';
		$respon = '#job_team_two';
		ajax($url, $type, $data, $respon);

		$data = [
			'user_id' 	=> 83, // Berlin
			'column'	=> $this->array_job_team()
		];
		$data = json_encode($data);
		$url  = base_url('Dashboard/ajax_count_job_two');
		$type = 'POST';
		$respon = '#count_job_two';
		ajax($url, $type, $data, $respon);

		// AJAX JOB TEAM THREE
		// ============================================= 
		$data = [
			'user_id' 	=> 3, // Mas Erwin
			'column'	=> $this->array_job_team()
		];
		$data = json_encode($data);
		$url  = base_url('Dashboard/ajax_job_three');
		$type = 'POST';
		$respon = '#job_team_three';
		ajax($url, $type, $data, $respon);

		$data = [
			'user_id' 	=> 3, // Charles
			'column'	=> $this->array_job_team()
		];
		$data = json_encode($data);
		$url  = base_url('Dashboard/ajax_count_job_three');
		$type = 'POST';
		$respon = '#count_job_three';
		ajax($url, $type, $data, $respon);
	}

	public function index()
	{
		// $x = $this->job_team();
		// echo '<pre>';
		// var_dump($x);
		// echo '</pre>';
		// die();
		$this->ajax_proccess();
		$count_team = $this->Blueprint->get_team(7);
		$count_team =  count($count_team);

		// ===========================================================================================
		// DATA WAITING FOR CONFIRM 

		// END DATA WAITING FOR CONFIRM 
		// ===========================================================================================

		// ===========================================================================================
		// DATA JOB ON OTHER DPARTEMENT

		$divisi_apd = 7;
		$column = ['ID', 'notes', 'jobdesk', 'priority', 'leader_id', 'due_date', 'progress', 'type'];
		$count_job_other = $this->Blueprint->get_project_dpartement($divisi_apd,  $column);
		$count_job_other = count($count_job_other);

		// END JOB ON OTHER DPARTEMENT
		// ===========================================================================================

		// ===========================================================================================
		// DATA JOB TEAM 

		$data_one = [
			'user_id' 	=> 25, // Charless
			'column'	=> $this->array_job_team()
		];

		$data_two = [
			'user_id' 	=> 83, // Berlin
			'column'	=> $this->array_job_team()
		];

		$data_three = [
			'user_id' 	=> 3, // Mas Erwin
			'column'	=> $this->array_job_team()
		];

		$user = $this->Blueprint->get_url_image($data_one['user_id']);

		$image_one =   $user[0]['notes_pict'];
		$nick_name_one = $user[0]['_nickname'];
		$image_one = image($image_one, $this->get_divisi($data_one['user_id']));
		$job_one = $this->Blueprint->get_projects_team($data_one['user_id'], $data_one['column']);
		$count_job_one = count($job_one);

		$user = $this->Blueprint->get_url_image($data_two['user_id']);
		$image_two =   $user[0]['notes_pict'];
		$nick_name_two = $user[0]['_nickname'];
		$image_two = image($image_two, $this->get_divisi($data_two['user_id']));
		$job_two = $this->Blueprint->get_projects_team($data_two['user_id'], $data_two['column']);
		$count_job_two = count($job_two);

		$user = $this->Blueprint->get_url_image($data_three['user_id']);
		$image_three =   $user[0]['notes_pict'];
		$nick_name_three = $user[0]['_nickname'];
		$image_three = image($image_three, $this->get_divisi($data_three['user_id']));
		$job_three = $this->Blueprint->get_projects_team($data_three['user_id'], $data_three['column']);
		$count_job_three = count($job_three);

		$count_bublechart = $this->data_bublechart();
		$count_bublechart = $count_bublechart[1]['total_count'];


		// END DATA JOB TEAM 
		// ===========================================================================================
		$data_marque = [
			'type' => 'marquee',
			'column'	=> ['meta_note'],
			'limit'		=> "LIMIT 1"
		];

		$data = [
			'content'	=> 'grid',
			'data'		=> [
				[
					'col'		=> '12 mt-xl p-0',
					'content'	=> 'grid',
					'data'		=>	[
						[
							'col'		=> '6',
							'content'	=> 'grid',
							'data'		=> [
								[
									'col'		=> '12',
									'content'	=> 'title',
									'data'		=> [
										'title'		=> 'Daily Task',
										'sub_title'	=> 'APD Dept'
									]
								],
								[
									'col'		=> '12',
									'content'	=> 'calendar',
									'data'		=> [
										'title'		=> 'Daily Task',
										'sub_title'	=> 'APD Dept'
									]
								],
							]
						],
						[
							'col'		=> '6',
							'content'	=> 'grid',
							'data'		=> [
								[
									'col'		=> '12',
									'content'	=> 'count-squad',
									'data'		=> [
										'total_squad'	=> $count_team,
										'squad_work'	=> $count_team
									]
								],
								[
									'id'		=> 'image_carousel',
									'col'		=> '12',
									'content'	=> 'image-carousel',
									'data'		=> $this->image_carousel()
								],
							]
						],
					]
				],
				[
					'col'		=> '12 mt-lg',
					'content'	=> 'grid',
					'data'		=> [
						[
							'col'		=> '6',
							'content'	=> 'card',
							'data'		=> [
								'id'		=> 'waiting_job',
								'title'		=> 'Waiting For Confirm',
								'icon'		=> '',
								'count_id'	=> 'count_request',
								'count'		=> $this->count_waiting_job(),
								'date'		=> '',
								'content'	=> 'table-scroll',
								'color'		=> 'bg-light card-square',
								'data'		=> $this->table_waiting_job()
							]
						],
						[
							'col'		=> '6',
							'content'	=> 'card',
							'data'		=> [
								'id'		=> 'buble_chart',
								'count_id'	=> 'count_bublechart',
								'title'		=> 'Total Request',
								'icon'		=> '<span class="cube bg-purple ml-xl"></span>',
								'count'		=> $count_bublechart,
								'date'		=> '',
								'content'	=> 'buble-chart',
								'color'		=> 'bg-light card-square',
								'data'		=> $this->buble_chart()
							]
						],
					]
				],
				[
					'col'		=> '12 mt-lg pl-xl pr-xl',
					'content'	=> 'card',
					'data'		=> [
						'id'		=> 'job_other_dpartement',
						'count_id'	=> 'count_job_other',
						'title'		=> 'Job On Other Dpartement',
						'icon'		=> '',
						'count'		=> $count_job_other,
						'date'		=> '',
						'content'	=> 'table-scroll',
						'color'		=> 'bg-light card-landscape',
						'data'		=> $this->job_other_dpartment()
					]
				],
				[
					'col'		=> '12',
					'content'	=> 'grid',
					'data'		=> [
						[
							'col'		=> '6',
							'content'	=> 'grid',
							'data'		=> [
								[
									'col'       => '12 mt-lg p-0',
									'content'   => 'card',
									'data'  => [
										'id'        => 'job_team_one',
										'count_id'  => 'count_job_one',
										'title'     => $nick_name_one,
										'icon'      => $image_one,
										'count'     => $count_job_one,
										'date'      => '',
										'content'   => 'card-list',
										'color'     => 'bg-linear-purple card-square',
										'data'      => $this->job_one($data_one)
									]
								],
								[
									'col'       => '12 mt-lg p-0',
									'content'   => 'card',
									'data'  => [
										'id'        => 'job_team_two',
										'count_id'  => 'count_job_two',
										'title'     => $nick_name_two,
										'icon'      => $image_two,
										'count'     => $count_job_two,
										'date'      => '',
										'content'   => 'card-list',
										'color'     => 'bg-linear-purple card-square',
										'data'      => $this->job_two($data_two)
									]
								],
							]
						],
						[
							'col'		=> '6',
							'content'	=> 'grid',
							'data'		=> [
								[
									'col'		=> '12 mt-lg p-0',
									'content'	=> 'card',
									'data'	=> [
										'id'		=> 'job_team_three',
										'count_id'	=> 'count_job_three',
										'title'		=> $nick_name_three,
										'icon'		=> $image_three,
										'count'		=> $count_job_three,
										'date'		=> '',
										'content'	=> 'card-list',
										'color'		=> 'bg-linear-purple card-tall',
										'data'		=> $this->job_three($data_three)
									]
								],
							]
						],
					]
				]
			]
		];
		$data['marquee'] = $this->marquee($data_marque);
		$this->load->view('layout', $data);
	}

	public function image_carousel()
	{
		$id = 7;
		$data_teams = $this->Blueprint->get_jbd_module(['leader_dept', 'detail'], "AND ID=$id");
		$leader = $data_teams[0]['leader_dept'];
		$detail = $data_teams[0]['detail'];
		$detail = explode(',', $detail);
		array_push($detail, $leader);

		$data = [];
		foreach ($detail as $val) {
			$user = $this->Blueprint->get_url_image($val);
			$check_work = $this->Blueprint->get_team_work($val);
			$url_img =   $user[0]['notes_pict'];
			$data[] = [
				'url_image'	=> $url_img,
				'status'	=> $check_work['status']
			];
		}
		return $data;
	}

	public function ajax_image_carousel()
	{
		$data['data'] = $this->image_carousel();
		$this->load->view('digital-signage/template/image-carousel', $data);
	}

	// ******************************************************************************
	// ============================
	// WAITING JOB START
	// ============================

	public function count_waiting_job()
	{
		$divisi_apd = 7;
		$status_prepare = 1;
		$count_project_apd = $this->Blueprint->count($divisi_apd, $status_prepare);
		return $count_project_apd;
	}

	public function ajax_count_waiting_job()
	{
		$divisi_apd = 7;
		$status_prepare = 1;
		$count_project_apd = $this->Blueprint->count($divisi_apd, $status_prepare);
		echo $count_project_apd;
	}

	public function table_waiting_job()
	{
		$divisi_apd = 7;
		$column = ['notes', 'jobdesk', 'priority', 'leader_id'];
		$data = $this->Blueprint->get_project_dpartement($divisi_apd,  $column);


		$config['data']['table'] = [
			'class'	=> 'table-scroll'
		];
		$config['data']['thead'] = array(
			array(
				'class'	=> 'text-center w-5',
				'data'	=> '',
			),
			array(
				'class' => 'text-center w-5',
				'data'  => 'No',
			),
			array(
				'class' => 'text-left w-auto',
				'data'  => 'Title',
			),
			array(
				'class' => 'text-center w-10',
				'data'  => 'Request',
			),
		);

		$no = 0;
		foreach ($data as $key => $val) {
			switch ($val['priority']) {
				case '1':
					$priority = 'green';
					break;
				case '3':
					$priority = 'yellow';
					break;
				case '5':
					$priority = 'red';
					break;
			}
			$user = $this->Blueprint->get_url_image($val['leader_id']);
			$image =   $user[0]['notes_pict'];

			$config['data']['tbody'][$key] = array(
				array(
					'class' => 'text-center',
					'data'  => '<div class="line-vertical-' . $priority . '"></div>'
				),
				array(
					'class' => 'text-center',
					'data'  => ++$no
				),
				array(
					'class' => 'text-left',
					'data'  => $val['notes'] . '<br>' . '<h5>' . substr($val['jobdesk'], 0, 20) . '</h5>',
				),
				array(
					'class' => 'text-center',
					'data'  => image($image, $this->get_divisi($val['leader_id']))
				),
			);
		}
		return $config;
	}

	function ajax_table_waiting_job()
	{
		$data = $this->table_waiting_job();
		$this->load->view('digital-signage/template/table-scroll', $data);
	}

	// ============================
	// WAITING JOB END
	// ============================

	// ******************************************************************************

	// ============================
	// BUBLE CHART START
	// ============================

	public function buble_chart()
	{
		$data = $this->data_bublechart();

		$config = [];
		foreach ($data[0] as $val) {
			$config[] = [
				'divisi'	=> $val['divisi'],
				'count'		=> $val['total_job']
			];
		}
		return $config;
	}

	public function data_bublechart()
	{
		$divisi_apd = 7;
		$data = $this->Sobad_module->get_id($divisi_apd, [])[0];
		$team = explode(",", $data['detail']);

		array_push($team, $data['leader_dept']);
		$team =  implode(", ", array_map('intval', $team));

		$get_project_detail = $this->Sobad_project_detail->get_all(['project_id'], 'AND user_id IN (' . $team . ')');
		$data_post = [];
		$count = 0;
		$count_joborder = 0;
		$count_newproduct = 0;
		$count_designgraphic = 0;
		foreach ($get_project_detail as $val) {
			$id_project_detail = $val['project_id'];
			$get_project = $this->Sobad_project->get_all(['project'], 'AND ID =' . $id_project_detail . '');
			foreach ($get_project as $value) {
				$project = $value['project'];
				$get_sag_post = $this->Sobad_group_post->get_all(['title', 'reff_note'], 'AND var="apd_product" AND ID =' . $project . '');
				if (!empty($get_sag_post)) {
					$data_post[] = $get_sag_post;
				}
			}
		}

		foreach ($data_post as $value) {
			$value = $value[0];
			if ($value['reff_note'] == 1) {
				$count_joborder++;
			} else if ($value['reff_note'] == 2) {
				$count_newproduct++;
			} elseif ($value['reff_note'] == 3) {
				$count_designgraphic++;
			}
			$count++;
		}

		$data = [
			[
				[
					'divisi'	=> 'Design Grafis',
					'total_job'	=> $count_designgraphic
				],
				[
					'divisi'	=> 'Job Order',
					'total_job'	=> $count_joborder
				],
				[
					'divisi'	=> 'New Product',
					'total_job'	=> $count_newproduct
				],
			],
			[
				'total_count'	=> $count
			]
		];

		return $data;
	}

	public function ajax_bublechart()
	{
		$data['data'] = $this->buble_chart();
		$this->load->view('digital-signage/template/buble-chart', $data);
	}

	public function count_bublechart()
	{
		$count = $this->data_bublechart();
		$count = $count[1];

		echo $count['total_count'];
	}

	// ============================
	// BUBLE CHART END
	// ============================

	// ******************************************************************************

	// ============================
	// JOB OTHER DPARTEMENT START
	// ============================


	public function job_other_dpartment()
	{
		$divisi_apd = 7;
		$column = ['ID', 'notes', 'jobdesk', 'priority', 'leader_id', 'due_date', 'progress', 'type'];
		$data = $this->Blueprint->get_project_dpartement($divisi_apd,  $column);

		$config['data']['table'] = [
			'class'	=> 'table1-scroll'
		];

		$config['data']['thead'] = array(
			array(
				'class'	=> 'text-center',
				'data'	=> '',
			),
			array(
				'class' => 'text-center',
				'data'  => 'No',
			),
			array(
				'class' => 'text-left',
				'data'  => 'Title',
			),
			array(
				'class' => 'text-center w-5',
				'data'  => 'Req',
			),
			array(
				'class' => 'text-center w-20',
				'data'  => 'Pelaksana',
			),
			array(
				'class' => 'text-center',
				'data'  => 'Due Date',
			),
			array(
				'class' => 'text-center w-10',
				'data'  => 'Status',
			),
			array(
				'class' => 'text-center w-10',
				'data'  => 'Proggress',
			),
		);

		$no = 0;
		foreach ($data as $key => $val) {
			$get_team = $this->Blueprint->get_project_detail($val['ID'], ['user_id'])[0];

			$user = $this->Blueprint->get_url_image($val['leader_id']);
			$image_leader =   $user[0]['notes_pict'];

			$user = $this->Blueprint->get_url_image($get_team['user_id']);
			$image_team =   $user[0]['notes_pict'];
			$image_teams = [
				'image'		=> $image_team,
				'divisi'	=> $this->get_divisi($get_team['user_id'])
			];

			$progress =  0;
			switch ($val['priority']) {
				case '1':
					$priority = 'green';
					break;
				case '3':
					$priority = 'yellow';
					break;
				case '5':
					$priority = 'red';
					break;
			}
			$config['data']['tbody'][$key] = array(
				array(
					'class' => 'text-center',
					'data'  => ' <div class="line-vertical-' . $priority . '"></div>'
				),
				array(
					'class' => 'text-center',
					'data'  => ++$no,
				),
				array(
					'class' => 'text-left',
					'data'  => $val['notes'],
				),
				array(
					'class' => 'text-center',
					'data'  => image($image_leader, $this->get_divisi($val['leader_id'])),
				),
				array(
					'class' => 'text-center',
					'data'  =>  $this->image_multiple($image_teams),
				),
				array(
					'class' => 'text-center',
					'data'  => $val['due_date']
				),
				array(
					'class' => 'text-center',
					'data'  => '<div class="flex justify-center">
								<div class="circle-state bg-green mr-xs"></div>
								<h4 class="text-medium">Active</h4>
							</div>'
				),
				array(
					'class' => 'text-center',
					'data'  => '<div class ="flex justify-center">
								<div class="radialProgressBar progress-' . $progress . '">
									<div class="overlay"><span class="deep-grey"> ' . $progress . '%</span></div>
								</div>
							</div>
							'
				),
			);
		}

		return $config;
	}

	public function ajax_job_other_dpartment()
	{
		$data = $this->job_other_dpartment();
		$this->load->view('digital-signage/template/table-scroll', $data);
	}

	public function image_multiple($data = [])
	{
		$data = [$data];
		ob_start();
?>
		<div class="flex justify-center">
			<?php foreach ($data as $val) { ?>
				<?= image($val['image'], $val['divisi']) ?>
			<?php } ?>
		</div>

<?php
		$contents = ob_get_clean();
		return $contents;
	}

	public function ajax_count_job_other_dpartment()
	{
		$divisi_apd = 7;
		$column = ['ID', 'notes', 'jobdesk', 'priority', 'leader_id', 'due_date', 'progress', 'type'];
		$data = $this->Blueprint->get_project_dpartement($divisi_apd,  $column);

		$data = count($data);

		echo $data;
	}

	// ============================
	// JOB OTHER DPARTEMENT END
	// ============================

	public function get_divisi($id = 0)
	{
		$get_divisi = $this->Blueprint->get_jbd_module(['name', 'detail', 'leader_dept'], "");
		foreach ($get_divisi as $value) {
			$team = explode(",", $value['detail']);
			if (in_array($id, $team) || $id == $value['leader_dept']) {
				$divisi = $value['name'];
			}
		}
		return $divisi;
	}

	public function job_one($args = array())
	{
		$user_id = $args['user_id'];
		$column = $args['column'];
		$data = $this->Blueprint->get_projects_team($user_id, $column);
		$config = [];

		foreach ($data as $val) {
			$get_sag_post = $this->Blueprint->get_post();
			$leader_project = $val['leader_id_proj'];
			$get_divisi = $this->get_divisi($leader_project);
			switch ($val['status_proj']) {
				case '1':
					$status = 'dark-grey';
					break;
				case '2':
					$status = 'green';
					break;
				case '3':
					$status = 'red';
					break;
				case '5':
					$status = 'purple';
					break;
				case '6':
					$status = 'yellow';
					break;
			}
			switch ($val['priority_proj']) {
				case '1':
					$priority = 'green';
					break;
				case '3':
					$priority = 'yellow';
					break;
				case '5':
					$priority = 'red';
					break;
			}
			$user = $this->Blueprint->get_url_image($val['leader_id_proj']);
			$image_leader =   $user[0]['notes_pict'];

			$config[] = [
				'priority'	=> $priority,
				'title'		=> $val['notes_proj'],
				'image'		=> $image_leader,
				'date'		=> '',
				'hastag'	=> [],
				'divisi'	=> $get_divisi,
				'status'	=> $status,
				'proggress'	=> $val['progress'],
			];
		}
		return $config;
	}

	public function ajax_job_one()
	{
		$args = $this->input->post('args');

		$data['data'] = $this->job_one($args);
		$this->load->view('digital-signage/template/card-list', $data);
	}

	public function ajax_count_job_one()
	{
		$args = $this->input->post('args');
		$user_id = $args['user_id'];
		$column = $args['column'];
		$data = $this->Blueprint->get_projects_team($user_id, $column);
		$count = count($data);
		echo $count;
	}


	public function job_two($args = array())
	{
		$user_id = $args['user_id'];
		$column = $args['column'];
		$data = $this->Blueprint->get_projects_team($user_id, $column);
		$config = [];
		foreach ($data as $val) {
			$leader_project = $val['leader_id_proj'];
			$get_divisi = $this->get_divisi($leader_project);
			switch ($val['status_proj']) {
				case '1':
					$status = 'dark-grey';
					break;
				case '2':
					$status = 'green';
					break;
				case '3':
					$status = 'red';
					break;
				case '5':
					$status = 'purple';
					break;
				case '6':
					$status = 'yellow';
					break;
			}
			switch ($val['priority_proj']) {
				case '1':
					$priority = 'green';
					break;
				case '3':
					$priority = 'yellow';
					break;
				case '5':
					$priority = 'red';
					break;
			}
			$user = $this->Blueprint->get_url_image($val['leader_id_proj']);
			$image_leader =   $user[0]['notes_pict'];

			$config[] = [
				'priority'	=> $priority,
				'title'		=> $val['notes_proj'],
				'image'		=> $image_leader,
				'date'		=> '',
				'hastag'	=> [],
				'divisi'	=> $get_divisi,
				'status'	=> $status,
				'proggress'	=> $val['progress'],
			];
		}
		return $config;
	}

	public function ajax_job_two()
	{
		$args = $this->input->post('args');

		$data['data'] = $this->job_two($args);
		$this->load->view('digital-signage/template/card-list', $data);
	}

	public function ajax_count_job_two()
	{
		$args = $this->input->post('args');
		$user_id = $args['user_id'];
		$column = $args['column'];
		$data = $this->Blueprint->get_projects_team($user_id, $column);
		$count = count($data);
		echo $count;
	}

	public function job_three($args = array())
	{
		$user_id = $args['user_id'];
		$column = $args['column'];
		$data = $this->Blueprint->get_projects_team($user_id, $column);
		$config = [];
		foreach ($data as $val) {
			$leader_project = $val['leader_id_proj'];
			$get_divisi = $this->get_divisi($leader_project);
			switch ($val['status_proj']) {
				case '1':
					$status = 'dark-grey';
					break;
				case '2':
					$status = 'green';
					break;
				case '3':
					$status = 'red';
					break;
				case '5':
					$status = 'purple';
					break;
				case '6':
					$status = 'yellow';
					break;
			}
			switch ($val['priority_proj']) {
				case '1':
					$priority = 'green';
					break;
				case '3':
					$priority = 'yellow';
					break;
				case '5':
					$priority = 'red';
					break;
			}
			$user = $this->Blueprint->get_url_image($val['leader_id_proj']);
			$image_leader =   $user[0]['notes_pict'];
			$config[] = [
				'priority'	=> $priority,
				'title'		=> $val['notes_proj'],
				'image'		=> $image_leader,
				'date'		=> '',
				'hastag'	=> [],
				'divisi'	=> $get_divisi,
				'status'	=> $status,
				'proggress'	=> $val['progress'],
			];
		}
		return $config;
	}

	public function ajax_job_three()
	{
		$args = $this->input->post('args');

		$data['data'] = $this->job_three($args);
		$this->load->view('digital-signage/template/card-list', $data);
	}

	public function ajax_count_job_three()
	{
		$args = $this->input->post('args');
		$user_id = $args['user_id'];
		$column = $args['column'];
		$data = $this->Blueprint->get_projects_team($user_id, $column);
		$count = count($data);
		echo $count;
	}

	public function marquee($args = [])
	{
		$type   = $args['type'];
		$column = $args['column'];
		$limit = $args['limit'];

		$data = $this->Blueprint->get_meta($type, $column, $limit);

		return $data;
	}

	public function ajax_marquee()
	{
	}
}
