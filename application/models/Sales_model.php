<?php
class Sales_model extends CI_Model {

  public function getAll() {
    return $this->db->get('sales')->result();
  }

  public function getById($id) {
    return $this->db->get_where('sales', ['id_sales' => $id])->row();
  }

  public function insert($data) {
    return $this->db->insert('sales', $data);
  }

  public function update($id, $data) {
    return $this->db->update('sales', $data, ['id_sales' => $id]);
  }

  public function delete($id) {
    return $this->db->delete('sales', ['id_sales' => $id]);
  }

  public function jumlah_sales() {
    return $this->db->count_all('sales');
}

  public function get_all() {
        return $this->db->get('sales')->result();  // asumsikan tabelnya bernama 'sales'
    }

  
  
}
