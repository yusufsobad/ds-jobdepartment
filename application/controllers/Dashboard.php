<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model('Blueprint');
	}

	public function index()
	{
		// AJAX WAITING JOB
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

		// AJAX BUBLE CHART
		// ============================================= 
		$data = '';
		$data = json_encode($data);
		$url  = base_url('Dashboard/buble_chart');
		$type = 'POST';
		$respon = '';
		ajax($url, $type, $data, $respon);

		// AJAX JOB ON OTHER DPARTEMENT
		// ============================================= 
		$data = '';
		$data = json_encode($data);
		$url  = base_url('Dashboard/ajax_job_other_dpartment');
		$type = 'POST';
		$respon = '#job_other_dpartement';
		ajax($url, $type, $data, $respon);



		$image = '<div class="avatar bg-red ml-lg">
						<img width="40px" src="assets/Sasi-Dashboard/img/template/fajar.png" alt="">
					</div>
				';

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
										'total_squad'	=> '5',
										'squad_work'	=> '3'
									]
								],
								[
									'col'		=> '12',
									'content'	=> 'image-carousel',
									'data'		=> ''
								],
							]
						],
					]
				],
				[
					'col'		=> '12 mt-xl',
					'content'	=> 'grid',
					'data'		=> [
						[
							'col'		=> '6',
							'content'	=> 'card',
							'data'		=> [
								'id'		=> 'waiting_job',
								'title'		=> 'Waiting Job',
								'icon'		=> '',
								'count_id'	=> 'count_request',
								'count'		=> '',
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
								'color'		=> 'bg-light',
								'data'		=> $this->buble_chart()
							]
						],
					]
				],
				[
					'col'		=> '12 mt-xl p-xl',
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
									'col'		=> '12 mt-xl p-0',
									'content'	=> 'card',
									'data'	=> [
										'id'		=> '',
										'title'		=> 'Job On Other Dpartement',
										'icon'		=> $image,
										'count'		=> '08',
										'date'		=> '',
										'content'	=> 'card-list',
										'color'		=> 'bg-light',
										'data'		=> $this->job_team()
									]
								],
								[
									'col'		=> '12 mt-xl p-0',
									'content'	=> 'card',
									'data'	=> [
										'id'		=> '',
										'title'		=> 'Job On Other Dpartement',
										'icon'		=> $image,
										'count'		=> '08',
										'date'		=> '',
										'content'	=> 'card-list',
										'color'		=> 'bg-light',
										'data'		=> $this->job_team()
									]
								],
							]
						],
						[
							'col'		=> '6',
							'content'	=> 'grid',
							'data'		=> [
								[
									'col'		=> '12 mt-xl p-0',
									'content'	=> 'card',
									'data'	=> [
										'id'		=> '',
										'title'		=> 'Job On Other Dpartement',
										'icon'		=> $image,
										'count'		=> '08',
										'date'		=> '',
										'content'	=> 'card-list',
										'color'		=> 'bg-light',
										'data'		=> $this->job_team()
									]
								],
							]
						],
					]
				]
			]
		];
		$this->load->view('layout', $data);
	}

	public function image_carousel()
	{
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



			$image = '<div class="avatar bg-red">
						<img width="40px" src="https://s.soloabadi.com/system-absen/asset/img/user/' . $val['leader_id'] . '" alt="">
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
					'data'  => $val['notes'] . '<br>' . '<h5>' . substr($val['jobdesk'], 0, 50) . '</h5>',
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
		$column = ['notes', 'jobdesk', 'priority', 'leader_id', 'due_date'];
		$data = $this->Blueprint->get_project_dpartement($divisi_apd,  $column);

		$image = '<div class="avatar bg-red">
					<img width="40px" src="assets/Sasi-Dashboard/img/template/fajar.png" alt="">
				</div>';

		$image_multiple = $this->image_multiple();

		$config['table'] = [
			'class'	=> 'table1-scroll'
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
			$config['tbody'][$key] = array(
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
					'data'  => $image,
				),
				array(
					'class' => 'text-center',
					'data'  => $image_multiple,
				),
				array(
					'class' => 'text-center',
					'data'  => '18 Feb 2022'
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
								<div class="radialProgressBar progress-60">
									<div class="overlay"><span class="deep-grey">10%</span></div>
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

	public function image_multiple()
	{
		$data = [
			[
				'image'	=> 'fajar',
				'color'	=> 'purple'
			],
			[
				'image'	=> 'fajar',
				'color'	=> 'yellow'
			],
			[
				'image'	=> 'fajar',
				'color'	=> 'green'
			],
			[
				'image'	=> 'fajar',
				'color'	=> 'red'
			],
		];
		ob_start();
?>
		<div class="flex justify-center">
			<?php foreach ($data as $val) { ?>
				<div class="avatar bg-<?= $val['color'] ?>">
					<img width="40px" src="assets/Sasi-Dashboard/img/template/<?= $val['image'] ?>.png" alt="">
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


	public function job_team()
	{
		$data = [
			[
				'title'		=> 'Membuat Design Plakat',
				'date'		=> '18 Feb 2021',
				'image'		=> 'fajar',
				'status' 	=> 'green',
				'hastag'	=>	['kmi', 'job order', 'project'],
				'proggress'	=> '100',
				'name'		=> 'Charles'
			],
			[
				'title'		=> 'Membuat Design Plakat',
				'date'		=> '18 Feb 2021',
				'image'		=> 'fajar',
				'status' 	=> 'red',
				'hastag'	=>	['kmi', 'job order', 'project'],
				'proggress'	=> '50',
				'name'		=> 'Ganang'
			],
			[
				'title'		=> 'Membuat Design Plakat',
				'date'		=> '18 Feb 2021',
				'image'		=> 'fajar',
				'status' 	=> 'yellow',
				'hastag'	=>	['kmi', 'job order', 'project'],
				'proggress'	=> '30',
				'name'		=> 'Pak Par'
			],
		];

		$config = [];
		foreach ($data as $val) {
			$config[] = [
				'title'		=> $val['title'],
				'image'		=> $val['image'],
				'date'		=> $val['date'],
				'hastag'	=> $val['hastag'],
				'status'	=> $val['status'],
				'proggress'	=> $val['proggress'],
			];
		}
		return $config;
	}
}