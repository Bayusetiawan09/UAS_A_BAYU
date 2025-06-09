<?php
class Produk_model extends CI_Model {

    public function get_all() {
        return $this->db->get('produk')->result();
    }

    public function insert($data) {
        return $this->db->insert('produk', $data);
    }

    public function getById($id)
    {
        return $this->db->get_where('produk', ['id_produk' => $id])->row();
    }

    public function update($id, $data)
    {
        $this->db->where('id_produk', $id);
        return $this->db->update('produk', $data);
    }

    public function delete($id)
    {
        return $this->db->delete('produk', ['id_produk' => $id]);
    }


  public function getStok($id_produk) {
    $produk = $this->db->get_where('produk', ['id_produk' => $id_produk])->row();
    if ($produk) {
        return $produk->stok;
    } else {
        return 0; 
    }
}

  public function updateStok($id_produk, $new_stok) {
    $this->db->update('produk', ['stok' => $new_stok], ['id_produk' => $id_produk]);
  }

  public function jumlah_produk() {
    return $this->db->count_all('produk');
}

}


