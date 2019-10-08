<?php
  class Paziente{
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    //Carica tutti i Pazienti
    public function getAllPazienti(){
      $this->db->query("SELECT * FROM schede_anagrafiche");

      $results = $this->db->resultSet();

      return $results;
    }

    public function getAllOrder(){
      $this->db->query("SELECT * FROM schede_anagrafiche ORDER BY cognome");

      $results = $this->db->resultSet();

      return $results;
    }


    public function getByNome($nome){
      $this->db->query("SELECT * FROM schede_anagrafiche
        WHERE schede_anagrafiche.nome = \"$nome\"");

      $results = $this->db->resultSet();

      return $results;
    }

    public function getByCognome($cognome){
      $this->db->query("SELECT * FROM schede_anagrafiche
        WHERE schede_anagrafiche.cognome = \"$cognome\"");

      $results = $this->db->resultSet();

      return $results;
    }

    public function getByNomeCognome($nome, $cognome){
      $this->db->query("SELECT * FROM schede_anagrafiche
        WHERE schede_anagrafiche.nome = \"$nome\" || schede_anagrafiche.cognome = \"$cognome\" ");

      $results = $this->db->resultSet();

      return $results;
    }

    public function getPaziente($id){
      $this->db->query("SELECT * FROM schede_anagrafiche WHERE id = :id");
      $this->db->bind(':id', $id);

      $row = $this->db->single();
      $results = $row;

      return $results;
    }

    public function getLastID(){
      $this->db->query("SELECT MAX(id) as maxID FROM schede_anagrafiche");

      $results = $this->db->single();

      return $results;

    }
    public function nuovoAnagrafica($data){
      $this->db->query("INSERT INTO schede_anagrafiche (nome, cognome, codice_fiscale, indirizzo, telefono_1, telefono_2, email)
      VALUES (:nome, :cognome, :codice_fiscale, :indirizzo, :telefono_1, :telefono_2, :email)");

      $this->db->bind(':nome', $data['nome']);
      $this->db->bind(':cognome', $data['cognome']);
      $this->db->bind(':codice_fiscale', $data['codice_fiscale']);
      $this->db->bind(':indirizzo', $data['indirizzo']);
      $this->db->bind(':telefono_1', $data['telefono_1']);
      $this->db->bind(':telefono_2', $data['telefono_2']);
      $this->db->bind(':email', $data['email']);

      if($this->db->execute()){
        return true;
      } else {
        return false;
      }

    }

    public function nuovoAnamnesi($data){
      $this->db->query("INSERT INTO anamnesi (id, risposta_1, risposta_2, risposta_3)
      VALUES (:id, :risposta_1, :risposta_2, :risposta_3)");

      $this->db->bind(':id', $data['id']);
      $this->db->bind(':risposta_1', $data['risposta_1']);
      $this->db->bind(':risposta_2', $data['risposta_2']);
      $this->db->bind(':risposta_3', $data['risposta_3']);

      if($this->db->execute()){
        return true;
      } else {
        return false;
      }

    }

    public function nuovoClinica($data){
      $this->db->query("INSERT INTO schede_cliniche (id)
      VALUES (:id)");

      $this->db->bind(':id', $data['id']);

      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    public function nuovoPaziente($data_anagrafica, $data_anamnesi){
      if($this->nuovoAnagrafica($data_anagrafica)){
        $data_anamnesi['id'] = (string) $this->getLastID()->maxID;
        if($this->nuovoAnamnesi($data_anamnesi)){
          $data_clinica['id'] = (string) $this->getLastID()->maxID;
          if($this->nuovoClinica($data_clinica)){
            return true;
          }else{
            return false;
          }
        }
      }
    }

    public function nuovoPreventivo($data){
      $id = $data['id'];
      $this->db->query("UPDATE schede_cliniche SET

      dente_11_op1 = :dente_11_op1,
      dente_11_op2 = :dente_11_op2,
      dente_11_op3 = :dente_11_op3,
      dente_11_op4 = :dente_11_op4,

      dente_12_op1 = :dente_12_op1,
      dente_12_op2 = :dente_12_op2,
      dente_12_op3 = :dente_12_op3,
      dente_12_op4 = :dente_12_op4,

      dente_13_op1 = :dente_13_op1,
      dente_13_op2 = :dente_13_op2,
      dente_13_op3 = :dente_13_op3,
      dente_13_op4 = :dente_13_op4,

      dente_14_op1 = :dente_14_op1,
      dente_14_op2 = :dente_14_op2,
      dente_14_op3 = :dente_14_op3,
      dente_14_op4 = :dente_14_op4,

      dente_15_op1 = :dente_15_op1,
      dente_15_op2 = :dente_15_op2,
      dente_15_op3 = :dente_15_op3,
      dente_15_op4 = :dente_15_op4,

      dente_16_op1 = :dente_16_op1,
      dente_16_op2 = :dente_16_op2,
      dente_16_op3 = :dente_16_op3,
      dente_16_op4 = :dente_16_op4,

      dente_17_op1 = :dente_17_op1,
      dente_17_op2 = :dente_17_op2,
      dente_17_op3 = :dente_17_op3,
      dente_17_op4 = :dente_17_op4,

      dente_18_op1 = :dente_18_op1,
      dente_18_op2 = :dente_18_op2,
      dente_18_op3 = :dente_18_op3,
      dente_18_op4 = :dente_18_op4,

      dente_21_op1 = :dente_21_op1,
      dente_21_op2 = :dente_21_op2,
      dente_21_op3 = :dente_21_op3,
      dente_21_op4 = :dente_21_op4,

      dente_22_op1 = :dente_22_op1,
      dente_22_op2 = :dente_22_op2,
      dente_22_op3 = :dente_22_op3,
      dente_22_op4 = :dente_22_op4,

      dente_23_op1 = :dente_23_op1,
      dente_23_op2 = :dente_23_op2,
      dente_23_op3 = :dente_23_op3,
      dente_23_op4 = :dente_23_op4,

      dente_24_op1 = :dente_24_op1,
      dente_24_op2 = :dente_24_op2,
      dente_24_op3 = :dente_24_op3,
      dente_24_op4 = :dente_24_op4,

      dente_25_op1 = :dente_25_op1,
      dente_25_op2 = :dente_25_op2,
      dente_25_op3 = :dente_25_op3,
      dente_25_op4 = :dente_25_op4,

      dente_26_op1 = :dente_26_op1,
      dente_26_op2 = :dente_26_op2,
      dente_26_op3 = :dente_26_op3,
      dente_26_op4 = :dente_26_op4,

      dente_27_op1 = :dente_27_op1,
      dente_27_op2 = :dente_27_op2,
      dente_27_op3 = :dente_27_op3,
      dente_27_op4 = :dente_27_op4,

      dente_28_op1 = :dente_28_op1,
      dente_28_op2 = :dente_28_op2,
      dente_28_op3 = :dente_28_op3,
      dente_28_op4 = :dente_28_op4,

      dente_31_op1 = :dente_31_op1,
      dente_31_op2 = :dente_31_op2,
      dente_31_op3 = :dente_31_op3,
      dente_31_op4 = :dente_31_op4,

      dente_32_op1 = :dente_32_op1,
      dente_32_op2 = :dente_32_op2,
      dente_32_op3 = :dente_32_op3,
      dente_32_op4 = :dente_32_op4,

      dente_33_op1 = :dente_33_op1,
      dente_33_op2 = :dente_33_op2,
      dente_33_op3 = :dente_33_op3,
      dente_33_op4 = :dente_33_op4,

      dente_34_op1 = :dente_34_op1,
      dente_34_op2 = :dente_34_op2,
      dente_34_op3 = :dente_34_op3,
      dente_34_op4 = :dente_34_op4,

      dente_35_op1 = :dente_35_op1,
      dente_35_op2 = :dente_35_op2,
      dente_35_op3 = :dente_35_op3,
      dente_35_op4 = :dente_35_op4,

      dente_36_op1 = :dente_36_op1,
      dente_36_op2 = :dente_36_op2,
      dente_36_op3 = :dente_36_op3,
      dente_36_op4 = :dente_36_op4,

      dente_37_op1 = :dente_37_op1,
      dente_37_op2 = :dente_37_op2,
      dente_37_op3 = :dente_37_op3,
      dente_37_op4 = :dente_37_op4,

      dente_38_op1 = :dente_38_op1,
      dente_38_op2 = :dente_38_op2,
      dente_38_op3 = :dente_38_op3,
      dente_38_op4 = :dente_38_op4,

      dente_41_op1 = :dente_41_op1,
      dente_41_op2 = :dente_41_op2,
      dente_41_op3 = :dente_41_op3,
      dente_41_op4 = :dente_41_op4,

      dente_42_op1 = :dente_42_op1,
      dente_42_op2 = :dente_42_op2,
      dente_42_op3 = :dente_42_op3,
      dente_42_op4 = :dente_42_op4,

      dente_43_op1 = :dente_43_op1,
      dente_43_op2 = :dente_43_op2,
      dente_43_op3 = :dente_43_op3,
      dente_43_op4 = :dente_43_op4,

      dente_44_op1 = :dente_44_op1,
      dente_44_op2 = :dente_44_op2,
      dente_44_op3 = :dente_44_op3,
      dente_44_op4 = :dente_44_op4,

      dente_45_op1 = :dente_45_op1,
      dente_45_op2 = :dente_45_op2,
      dente_45_op3 = :dente_45_op3,
      dente_45_op4 = :dente_45_op4,

      dente_46_op1 = :dente_46_op1,
      dente_46_op2 = :dente_46_op2,
      dente_46_op3 = :dente_46_op3,
      dente_46_op4 = :dente_46_op4,

      dente_47_op1 = :dente_47_op1,
      dente_47_op2 = :dente_47_op2,
      dente_47_op3 = :dente_47_op3,
      dente_47_op4 = :dente_47_op4,

      dente_48_op1 = :dente_48_op1,
      dente_48_op2 = :dente_48_op2,
      dente_48_op3 = :dente_48_op3,
      dente_48_op4 = :dente_48_op4
      WHERE id = \"$id\" ");

      $this->db->bind(':dente_11_op1', $data['dente_11_op1']);
      $this->db->bind(':dente_11_op2', $data['dente_11_op2']);
      $this->db->bind(':dente_11_op3', $data['dente_11_op3']);
      $this->db->bind(':dente_11_op4', $data['dente_11_op4']);

      $this->db->bind(':dente_12_op1', $data['dente_12_op1']);
      $this->db->bind(':dente_12_op2', $data['dente_12_op2']);
      $this->db->bind(':dente_12_op3', $data['dente_12_op3']);
      $this->db->bind(':dente_12_op4', $data['dente_12_op4']);

      $this->db->bind(':dente_13_op1', $data['dente_13_op1']);
      $this->db->bind(':dente_13_op2', $data['dente_13_op2']);
      $this->db->bind(':dente_13_op3', $data['dente_13_op3']);
      $this->db->bind(':dente_13_op4', $data['dente_13_op4']);

      $this->db->bind(':dente_14_op1', $data['dente_14_op1']);
      $this->db->bind(':dente_14_op2', $data['dente_14_op2']);
      $this->db->bind(':dente_14_op3', $data['dente_14_op3']);
      $this->db->bind(':dente_14_op4', $data['dente_14_op4']);

      $this->db->bind(':dente_15_op1', $data['dente_15_op1']);
      $this->db->bind(':dente_15_op2', $data['dente_15_op2']);
      $this->db->bind(':dente_15_op3', $data['dente_15_op3']);
      $this->db->bind(':dente_15_op4', $data['dente_15_op4']);

      $this->db->bind(':dente_16_op1', $data['dente_16_op1']);
      $this->db->bind(':dente_16_op2', $data['dente_16_op2']);
      $this->db->bind(':dente_16_op3', $data['dente_16_op3']);
      $this->db->bind(':dente_16_op4', $data['dente_16_op4']);

      $this->db->bind(':dente_17_op1', $data['dente_17_op1']);
      $this->db->bind(':dente_17_op2', $data['dente_17_op2']);
      $this->db->bind(':dente_17_op3', $data['dente_17_op3']);
      $this->db->bind(':dente_17_op4', $data['dente_17_op4']);

      $this->db->bind(':dente_18_op1', $data['dente_18_op1']);
      $this->db->bind(':dente_18_op2', $data['dente_18_op2']);
      $this->db->bind(':dente_18_op3', $data['dente_18_op3']);
      $this->db->bind(':dente_18_op4', $data['dente_18_op4']);

      $this->db->bind(':dente_21_op1', $data['dente_21_op1']);
      $this->db->bind(':dente_21_op2', $data['dente_21_op2']);
      $this->db->bind(':dente_21_op3', $data['dente_21_op3']);
      $this->db->bind(':dente_21_op4', $data['dente_21_op4']);

      $this->db->bind(':dente_22_op1', $data['dente_22_op1']);
      $this->db->bind(':dente_22_op2', $data['dente_22_op2']);
      $this->db->bind(':dente_22_op3', $data['dente_22_op3']);
      $this->db->bind(':dente_22_op4', $data['dente_22_op4']);

      $this->db->bind(':dente_23_op1', $data['dente_23_op1']);
      $this->db->bind(':dente_23_op2', $data['dente_23_op2']);
      $this->db->bind(':dente_23_op3', $data['dente_23_op3']);
      $this->db->bind(':dente_23_op4', $data['dente_23_op4']);

      $this->db->bind(':dente_24_op1', $data['dente_24_op1']);
      $this->db->bind(':dente_24_op2', $data['dente_24_op2']);
      $this->db->bind(':dente_24_op3', $data['dente_24_op3']);
      $this->db->bind(':dente_24_op4', $data['dente_24_op4']);

      $this->db->bind(':dente_25_op1', $data['dente_25_op1']);
      $this->db->bind(':dente_25_op2', $data['dente_25_op2']);
      $this->db->bind(':dente_25_op3', $data['dente_25_op3']);
      $this->db->bind(':dente_25_op4', $data['dente_25_op4']);

      $this->db->bind(':dente_26_op1', $data['dente_26_op1']);
      $this->db->bind(':dente_26_op2', $data['dente_26_op2']);
      $this->db->bind(':dente_26_op3', $data['dente_26_op3']);
      $this->db->bind(':dente_26_op4', $data['dente_26_op4']);

      $this->db->bind(':dente_27_op1', $data['dente_27_op1']);
      $this->db->bind(':dente_27_op2', $data['dente_27_op2']);
      $this->db->bind(':dente_27_op3', $data['dente_27_op3']);
      $this->db->bind(':dente_27_op4', $data['dente_27_op4']);

      $this->db->bind(':dente_28_op1', $data['dente_28_op1']);
      $this->db->bind(':dente_28_op2', $data['dente_28_op2']);
      $this->db->bind(':dente_28_op3', $data['dente_28_op3']);
      $this->db->bind(':dente_28_op4', $data['dente_28_op4']);

      $this->db->bind(':dente_31_op1', $data['dente_31_op1']);
      $this->db->bind(':dente_31_op2', $data['dente_31_op2']);
      $this->db->bind(':dente_31_op3', $data['dente_31_op3']);
      $this->db->bind(':dente_31_op4', $data['dente_31_op4']);

      $this->db->bind(':dente_32_op1', $data['dente_32_op1']);
      $this->db->bind(':dente_32_op2', $data['dente_32_op2']);
      $this->db->bind(':dente_32_op3', $data['dente_32_op3']);
      $this->db->bind(':dente_32_op4', $data['dente_32_op4']);

      $this->db->bind(':dente_33_op1', $data['dente_33_op1']);
      $this->db->bind(':dente_33_op2', $data['dente_33_op2']);
      $this->db->bind(':dente_33_op3', $data['dente_33_op3']);
      $this->db->bind(':dente_33_op4', $data['dente_33_op4']);

      $this->db->bind(':dente_34_op1', $data['dente_34_op1']);
      $this->db->bind(':dente_34_op2', $data['dente_34_op2']);
      $this->db->bind(':dente_34_op3', $data['dente_34_op3']);
      $this->db->bind(':dente_34_op4', $data['dente_34_op4']);

      $this->db->bind(':dente_35_op1', $data['dente_35_op1']);
      $this->db->bind(':dente_35_op2', $data['dente_35_op2']);
      $this->db->bind(':dente_35_op3', $data['dente_35_op3']);
      $this->db->bind(':dente_35_op4', $data['dente_35_op4']);

      $this->db->bind(':dente_36_op1', $data['dente_36_op1']);
      $this->db->bind(':dente_36_op2', $data['dente_36_op2']);
      $this->db->bind(':dente_36_op3', $data['dente_36_op3']);
      $this->db->bind(':dente_36_op4', $data['dente_36_op4']);

      $this->db->bind(':dente_37_op1', $data['dente_37_op1']);
      $this->db->bind(':dente_37_op2', $data['dente_37_op2']);
      $this->db->bind(':dente_37_op3', $data['dente_37_op3']);
      $this->db->bind(':dente_37_op4', $data['dente_37_op4']);

      $this->db->bind(':dente_38_op1', $data['dente_38_op1']);
      $this->db->bind(':dente_38_op2', $data['dente_38_op2']);
      $this->db->bind(':dente_38_op3', $data['dente_38_op3']);
      $this->db->bind(':dente_38_op4', $data['dente_38_op4']);

      $this->db->bind(':dente_41_op1', $data['dente_41_op1']);
      $this->db->bind(':dente_41_op2', $data['dente_41_op2']);
      $this->db->bind(':dente_41_op3', $data['dente_41_op3']);
      $this->db->bind(':dente_41_op4', $data['dente_41_op4']);

      $this->db->bind(':dente_42_op1', $data['dente_42_op1']);
      $this->db->bind(':dente_42_op2', $data['dente_42_op2']);
      $this->db->bind(':dente_42_op3', $data['dente_42_op3']);
      $this->db->bind(':dente_42_op4', $data['dente_42_op4']);

      $this->db->bind(':dente_43_op1', $data['dente_43_op1']);
      $this->db->bind(':dente_43_op2', $data['dente_43_op2']);
      $this->db->bind(':dente_43_op3', $data['dente_43_op3']);
      $this->db->bind(':dente_43_op4', $data['dente_43_op4']);

      $this->db->bind(':dente_44_op1', $data['dente_44_op1']);
      $this->db->bind(':dente_44_op2', $data['dente_44_op2']);
      $this->db->bind(':dente_44_op3', $data['dente_44_op3']);
      $this->db->bind(':dente_44_op4', $data['dente_44_op4']);

      $this->db->bind(':dente_45_op1', $data['dente_45_op1']);
      $this->db->bind(':dente_45_op2', $data['dente_45_op2']);
      $this->db->bind(':dente_45_op3', $data['dente_45_op3']);
      $this->db->bind(':dente_45_op4', $data['dente_45_op4']);

      $this->db->bind(':dente_46_op1', $data['dente_46_op1']);
      $this->db->bind(':dente_46_op2', $data['dente_46_op2']);
      $this->db->bind(':dente_46_op3', $data['dente_46_op3']);
      $this->db->bind(':dente_46_op4', $data['dente_46_op4']);

      $this->db->bind(':dente_47_op1', $data['dente_47_op1']);
      $this->db->bind(':dente_47_op2', $data['dente_47_op2']);
      $this->db->bind(':dente_47_op3', $data['dente_47_op3']);
      $this->db->bind(':dente_47_op4', $data['dente_47_op4']);

      $this->db->bind(':dente_48_op1', $data['dente_48_op1']);
      $this->db->bind(':dente_48_op2', $data['dente_48_op2']);
      $this->db->bind(':dente_48_op3', $data['dente_48_op3']);
      $this->db->bind(':dente_48_op4', $data['dente_48_op4']);
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    public function eliminaPaziente($id){
      $this->db->query("DELETE FROM schede_anagrafiche WHERE id = \"$id\" ");
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    public function eliminaOperatore($id){
      $this->db->query("DELETE FROM operatori WHERE id = \"$id\" ");
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    public function eliminaPrestazione($id){
      $this->db->query("DELETE FROM listino WHERE id = \"$id\" ");
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }


    public function nuovoOperatore($data){
      $this->db->query("INSERT INTO operatori (nome, cognome)
      VALUES (:nome, :cognome)");

      $this->db->bind(':nome', $data['nome']);
      $this->db->bind(':cognome', $data['cognome']);

      if($this->db->execute()){
        return true;
      } else {
        return false;
      }

    }

    public function nuovoPrestazione($data){
      $this->db->query("INSERT INTO listino (nome, prezzo)
      VALUES (:nome, :prezzo)");

      $this->db->bind(':nome', $data['nome']);
      $this->db->bind(':prezzo', $data['prezzo']);

      if($this->db->execute()){
        return true;
      } else {
        return false;
      }

    }


    public function aggiornaAnagrafica($id, $data){
      $this->db->query("UPDATE schede_anagrafiche SET
      nome = :nome,
      cognome = :cognome,
      codice_fiscale = :codice_fiscale,
      indirizzo = :indirizzo,
      telefono_1 = :telefono_1,
      telefono_2 = :telefono_2,
      email = :email
      WHERE id = \"$id\" ");

      $this->db->bind(':nome', $data['nome']);
      $this->db->bind(':cognome', $data['cognome']);
      $this->db->bind(':codice_fiscale', $data['codice_fiscale']);
      $this->db->bind(':indirizzo', $data['indirizzo']);
      $this->db->bind(':telefono_1', $data['telefono_1']);
      $this->db->bind(':telefono_2', $data['telefono_2']);
      $this->db->bind(':email', $data['email']);

      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    public function aggiornaOpzioni($id, $dente, $data){
      $this->db->query("UPDATE schede_cliniche SET
      \"$dente. '_'. 'op1'\" = :op1,
      \"$dente. '_'. 'op2'\" = :op2,
      \"$dente. '_'. 'op3'\" = :op3,
      \"$dente. '_'. 'op4'\" = :op4,
      WHERE id = \"$id\" ");

      $this->db->bind(':op1', $data['op1']);
      $this->db->bind(':op2', $data['op2']);
      $this->db->bind(':op3', $data['op3']);
      $this->db->bind(':op4', $data['op4']);

      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    public function getAnamnesi($id){
      $this->db->query("SELECT * FROM anamnesi WHERE id = :id");
      $this->db->bind(':id', $id);

      $row = $this->db->single();
      $results = $row;

      return $results;
    }

    public function aggiornaAnamnesi($id, $data){
      $this->db->query("UPDATE anamnesi SET
      risposta_1 = :risposta_1,
      risposta_2 = :risposta_2,
      risposta_3 = :risposta_3
      WHERE id = \"$id\" ");

      $this->db->bind(':risposta_1', $data['risposta_1']);
      $this->db->bind(':risposta_2', $data['risposta_2']);
      $this->db->bind(':risposta_3', $data['risposta_3']);

      if($this->db->execute()){
        return true;
      } else {
        return false;
      }

    }


    public function aggiornaOperatori($data){
      $this->db->query("UPDATE operatori SET
      nome = :nome,
      cognome = :cognome
      WHERE id = :id");

      $this->db->bind(':id', $data['id']);
      $this->db->bind(':nome', $data['nome']);
      $this->db->bind(':cognome', $data['cognome']);

      if($this->db->execute()){
        return true;
      } else {
        return false;
      }

    }

    public function aggiornaPrestazioni($data){
      $this->db->query("UPDATE listino SET
      nome = :nome,
      prezzo = :prezzo
      WHERE id = :id");

      $this->db->bind(':id', $data['id']);
      $this->db->bind(':nome', $data['nome']);
      $this->db->bind(':prezzo', $data['prezzo']);

      if($this->db->execute()){
        return true;
      } else {
        return false;
      }

    }

    public function getClinica($id){
      $this->db->query("SELECT * FROM schede_cliniche WHERE id = :id");
      $this->db->bind(':id', $id);

      $results = $this->db->single();

      return $results;
    }

    public function getClinicaObj(){
      $this->db->query("SELECT * FROM schede_cliniche");

      $results = $this->db->resultSet();

      return $results;
    }


    public function getDenti(){
      $this->db->query("SELECT * FROM denti");

      $results = $this->db->resultSet();

      return $results;
    }

    public function getOpzioni(){
      $this->db->query("SELECT * FROM opzioni");

      $results = $this->db->resultSet();

      return $results;
    }

    public function getPrestazioni(){
      $this->db->query("SELECT * FROM listino");

      $results = $this->db->resultSet();

      return $results;
    }

    public function getOperatori(){
      $this->db->query("SELECT * FROM operatori");

      $results = $this->db->resultSet();

      return $results;
    }

    public function getMesi(){
      $this->db->query("SELECT * FROM mesi");

      $results = $this->db->resultSet();

      return $results;
    }

    public function getGiorni(){
      $this->db->query("SELECT * FROM giorni");

      $results = $this->db->resultSet();

      return $results;
    }


  public function getAppuntamenti($date){
    $this->db->query("SELECT * FROM appuntamenti WHERE data = :data");
    $this->db->bind(':data', $date);

    $results = $this->db->resultSet();

    return $results;

  }

  public function aggiungiAppuntamento($data){
    $this->db->query("INSERT INTO appuntamenti (data, orario, paziente, operatore, prestazione)
    VALUES (:data, :orario, :paziente, :operatore, :prestazione)");

    $this->db->bind(':data', $data['data']);
    $this->db->bind(':orario', $data['orario']);
    $this->db->bind(':paziente', $data['paziente']);
    $this->db->bind(':operatore', $data['operatore']);
    $this->db->bind(':prestazione', $data['prestazione']);

    if($this->db->execute()){
      return true;
    } else {
      return false;
    }

  }

}
?>
