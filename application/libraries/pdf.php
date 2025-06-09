<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH . 'third_party/dompdf/dompdf_config.inc.php';

class Pdf {
    protected $dompdf;

    public function __construct() {
        $this->dompdf = new DOMPDF();
    }

    public function load_html($html) {
        $this->dompdf->load_html($html);
    }

    public function render() {
        $this->dompdf->render();
    }

    public function stream($filename = "document.pdf", $options = array()) {
        $this->dompdf->stream($filename, $options);
    }

    public function set_paper($size = 'A4', $orientation = 'portrait') {
        $this->dompdf->set_paper($size, $orientation);
    }

    // Method custom untuk CodeIgniter
    public function generate_pdf($html, $filename = "document.pdf", $attachment = 0, $paper = 'A4', $orientation = 'portrait') {
        $this->set_paper($paper, $orientation);
        $this->load_html($html);
        $this->render();
        $this->stream($filename, array("Attachment" => $attachment));
    }
}
