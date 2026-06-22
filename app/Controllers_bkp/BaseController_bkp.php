<?php
namespace App\Controllers;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 *
 * @package CodeIgniter
 */

use CodeIgniter\Controller;

class BaseController extends Controller
{

	/**
	 * An array of helpers to be loaded automatically upon
	 * class instantiation. These helpers will be available
	 * to all other controllers that extend BaseController.
	 *
	 * @var array
	 */
	//protected $helpers = [];
	protected $helpers = ['url', 'file', 'app_helper','assign_team_member_helper','send_sms_helper','profile_in_process_helper','application_submitted_helper','approve_helper','refused_helper','count_helper','profile_created_helper','biometric_requested_helper','biometric_completed_helper','interview_ADR_requested_helper','interview_ADR_completed_helper','passport_requested_helper','information_requested_for_advertisement_helper','advertisement_started_helper','documents_awaiting_for_submission_helper','LMIA_number_received_helper'];


	/**
	 * Constructor.
	 */
	public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
	{
		// Do Not Edit This Line
		parent::initController($request, $response, $logger);

		//--------------------------------------------------------------------
		// Preload any models, libraries, etc, here.
		//--------------------------------------------------------------------
		// E.g.:
		// $this->session = \Config\Services::session();
	}

}
