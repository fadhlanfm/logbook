    var counter = 1;

    var limit = 5;

    function addInput(divName){

         if (counter == limit)  {

              alert("You have reached the limit of adding " + counter + " inputs");

         }

         else {

              var newdiv = document.createElement('div');

              newdiv.innerHTML = "Entry " + (counter + 1) + " 
          <tr>
          <td>Memberikan Nilai Tambah Bagi Perusahaan</td>
          <td>
            <label>Aktifitas</label>
            <select class="browser-default" name="aktifitas[]" required>
              <option value="" disabled selected>Choose your option</option>
              <option value="Percepatan Proses">Percepatan Proses</option>
              <option value="Menjaga Reputasi/Image Perusahaan">Menjaga Reputasi/Image Perusahaan</option>
              <option value="Penurunan Error Rate">Penurunan Error Rate</option>
              <option value="Peningkatan Produktivitas Pegawai">Peningkatan Produktivitas Pegawai</option>
              <option value="Terpenuhinya SLA">Terpenuhinya SLA</option>
              <option value="Meminimalkan Kerugian Finansial">Meminimalkan Kerugian Finansial</option>
              <option value="Meningkatkan Layanan Kualitas">Meningkatkan Layanan Kualitas</option>
              <option value="Efisiensi">Efisiensi</option>
              <option value="Others (...)">Others (...)</option>
            </select>
          </td>
          <td>
            <div class="input-field col s6">
            <label for="target1">Target</label>
            <input type="text" id="target1" name="target[]">
            </div>
          </td>
          <td>
            <label>Satuan Target</label>
            <select class="browser-default" name="satuan[]" required>
              <option value="" disabled selected>Choose your option</option>
              <option value="Percepatan Proses">Uang (Rupiah)</option>
              <option value="Menjaga Reputasi/Image Perusahaan">Waktu (Hari)</option>
              <option value="Penurunan Error Rate">Presentasi (%)</option>
              <option value="Peningkatan Produktivitas Pegawai">Jumlah (Kali)</option>
              <option value="Others (...)">Others (...)</option>
            </select>
          </td>
        </tr>";
        
              document.getElementById(divName).appendChild(newdiv);

              counter++;

         }

    }