<?php
namespace Opencart\Admin\Controller\Extension\OpencartGopay\Menu;
use Opencart\System\Library\Log;
class GoPay extends \Opencart\System\Engine\Controller
{

	/**
	 * Create new tab on left menu.
	 *
	 * @since  1.0.0
	 */
	public function menus( $eventRoute, &$data ) {

		$gopay[] = [
			'name'	   => 'Info',
			'href'     => $this->url->link( 'extension/opencart_gopay/menu/gopay|info', 'user_token=' .
				$this->session->data['user_token'] ),
			'children' => []
		];

		$gopay[] = [
			'name'	   => 'Log',
			'href'     => $this->url->link( 'extension/opencart_gopay/menu/gopay|log', 'user_token=' .
				$this->session->data['user_token'] ),
			'children' => []
		];


		if ( $gopay ) {
			$data['menus'][] = [
				'id'       => 'menu-gopay',
				'icon'	   => 'fas fa-cog',
				'name'	   => 'WooCommerce GoPay gateway',
				'href'     => '',
				'children' => $gopay
			];
		}

	}

	/**
	 * Create info menu.
	 *
	 * @since  1.0.0
	 */
	public function info(): void {
		$this->load->language( 'extension/opencart_gopay/menu/gopay' );

		$data = array();

		$data['header']      = $this->load->controller( 'common/header' );
		$data['column_left'] = $this->load->controller( 'common/column_left' );
		$data['footer']      = $this->load->controller( 'common/footer' );

		$data['settings_page'] = $this->url->link( 'extension/opencart_gopay/payment/gopay', 'user_token=' .
			$this->session->data['user_token'] );

		$this->response->setOutput( $this->load->view( 'extension/opencart_gopay/menu/info', $data ) );
	}
}