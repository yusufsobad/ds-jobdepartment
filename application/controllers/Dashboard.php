<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model('Blueprint');
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
		// AJAX WAITING For Confirm
		// ============================================= 
		$data = '';
		$data = json_encode($data);
		$url  = base_url('Dashboard/count_waiting_job');
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
		$url  = base_url('Dashboard/buble_chart');
		$type = 'POST';
		$respon = '';
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
	}

	public function index()
	{
		$this->ajax_proccess();

		$count_team = $this->Blueprint->get_team(7);
		$count_team =  count($count_team);


		// DATA TEAM ===========================================================================================

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
		$image_one = '<div class="avatar bg-light-purple ml-lg">
						<img width="40px" src="https://s.soloabadi.com/system-absen/asset/img/user/' . $image_one . '" alt="">
					</div>
				';

		$user = $this->Blueprint->get_url_image($data_two['user_id']);
		$image_two =   $user[0]['notes_pict'];
		$nick_name_two = $user[0]['_nickname'];
		$image_two = '<div class="avatar bg-light-purple ml-lg">
						<img width="40px" src="https://s.soloabadi.com/system-absen/asset/img/user/' . $image_two . '" alt="">
					</div>
				';

		$user = $this->Blueprint->get_url_image($data_three['user_id']);
		$image_three =   $user[0]['notes_pict'];
		$nick_name_three = $user[0]['_nickname'];
		$image_three = '<div class="avatar bg-light-purple ml-lg">
						<img width="40px" src="https://s.soloabadi.com/system-absen/asset/img/user/' . $image_three . '" alt="">
					</div>
				';


		// END DATA TEAM ========================================================================================

		$data_marque = [
			'type' => 'marque',
			'column'	=> ['meta_note'],
			'limit'		=> 1
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
									'col'		=> '12',
									'content'	=> 'image-carousel',
									'data'		=> $this->image_carousel(7)
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
								'id'		=> '',
								'title'		=> 'Total Request',
								'icon'		=> '<span class="cube bg-purple ml-xl"></span>',
								'count'		=> '08',
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
						'title'		=> 'Job On Other Dpartement',
						'icon'		=> '',
						'count'		=> '08',
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
									'col'		=> '12 mt-lg p-0',
									'content'	=> 'card',
									'data'	=> [
										'id'		=> 'job_team_one',
										'title'		=> $nick_name_one,
										'icon'		=> $image_one,
										'count'		=> '08',
										'date'		=> '',
										'content'	=> 'card-list',
										'color'		=> 'bg-linear-purple card-square',
										'data'		=> $this->job_one($data_one)
									]
								],
								[
									'col'		=> '12 mt-lg p-0',
									'content'	=> 'card',
									'data'	=> [
										'id'		=> 'job_team_two',
										'title'		=> $nick_name_two,
										'icon'		=> $image_two,
										'count'		=> '08',
										'date'		=> '',
										'content'	=> 'card-list',
										'color'		=> 'bg-linear-purple card-square',
										'data'		=> $this->job_two($data_two)
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
										'title'		=> $nick_name_three,
										'icon'		=> $image_three,
										'count'		=> '08',
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

	public function image_carousel($id)
	{
		$data_squad = $this->Blueprint->get_team($id);

		$data = [];
		foreach ($data_squad as $val) {
			$data[] = [
				'url_image'	=> $val['url_image'],
				'status'	=> ''
			];
		}
		return $data;
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

			$image = '<div class ="flex justify-center">
						<div class="avatar bg-red">
							<img width="40px" src="https://s.soloabadi.com/system-absen/asset/img/user/' . $image . '" alt="">
						</div>
					</div>';
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
					'data'  => $image,
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
		$divisi_apd = 7;
		$status = 1;
		$column = ['reff_note'];
		$data = $this->Blueprint->count_project_status($divisi_apd, $status, $column);


		$data = [
			[
				'divisi'	=> 'Design Grafis',
				'total_job'	=> '9'
			],
			[
				'divisi'	=> 'Job Order',
				'total_job'	=> '12'
			],
			[
				'divisi'	=> 'New Product',
				'total_job'	=> '5'
			],
		];

		$config = [];
		foreach ($data as $val) {
			$config[] = [
				'divisi'	=> $val['divisi'],
				'count'		=> $val['total_job']
			];
		}
		return $config;
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
			$image_leader = '<div class="avatar bg-red">
					<img width="40px" src="https://s.soloabadi.com/system-absen/asset/img/user/' . $image_leader . '"  alt="">
				</div>';

			$user = $this->Blueprint->get_url_image($get_team['user_id']);
			$image_team =   $user[0]['notes_pict'];
			$image_teams = [
				'image'		=> $image_team,
				'color'	=> 'purple'
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
					'data'  => $image_leader,
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
				<div class="avatar bg-<?= $val['color'] ?>">
					<img width="40px" src="https://s.soloabadi.com/system-absen/asset/img/user/<?= $val['image'] ?>" alt="">
				</div>
			<?php } ?>
		</div>

<?php
		$contents = ob_get_clean();
		return $contents;
	}

	// ============================
	// JOB OTHER DPARTEMENT END
	// ============================

	public function table_confirm()
	{
		$data = [
			[
				'notes'		=> 'Gambar Design Trofi Bi',
				'jobdesk'	=> 'Bentuk Dibuat yang wooden tube',
				'priority'	=> '1', // Low
				'leader_id'	=> 'assets/Sasi-Dashboard/img/template/fajar.png',
			],
			[
				'notes'		=> 'Gambar Design Plakat',
				'jobdesk'	=> 'Dibikin Elegan',
				'priority'	=> '3', // Medium
				'leader_id'	=> 'assets/Sasi-Dashboard/img/template/fajar.png',
			],
			[
				'notes'		=> 'Gambar Design Pagar Museum',
				'jobdesk'	=> 'Design dengan tema wayang ',
				'priority'	=> '5', // High
				'leader_id'	=> 'assets/Sasi-Dashboard/img/template/fajar.png',
			],
		];

		$config['table'] = [
			'class'	=> 'table-scroll'
		];
		$config['thead'] = array(
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
				'class' => 'text-center',
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
			$image = '<div class="avatar bg-red">
					<img width="40px" src="' . $val['leader_id'] . '" alt="">
				</div>';
			$config['tbody'][$key] = array(
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
					'data'  => $val['notes'] . '<br>' . '<h5>' . $val['jobdesk'] . '</h5>',
				),
				array(
					'class' => 'text-center',
					'data'  => $image,
				),
			);
		}
		return $config;
	}

	public function job_one($args = array())
	{
		$user_id = $args['user_id'];
		$column = $args['column'];
		$data = $this->Blueprint->get_projects_team($user_id, $column);
		$config = [];
		foreach ($data as $val) {
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


	public function job_two($args = array())
	{
		$user_id = $args['user_id'];
		$column = $args['column'];
		$data = $this->Blueprint->get_projects_team($user_id, $column);
		$config = [];
		foreach ($data as $val) {
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

	public function job_three($args = array())
	{
		$user_id = $args['user_id'];
		$column = $args['column'];
		$data = $this->Blueprint->get_projects_team($user_id, $column);
		$config = [];
		foreach ($data as $val) {
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
