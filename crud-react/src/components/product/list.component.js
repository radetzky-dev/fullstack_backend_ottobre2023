import React, { useEffect, useState } from "react";
import { Link } from "react-router-dom";
import Button from "react-bootstrap/Button";
import axios from "axios";
import Swal from "sweetalert2";

export default function List() {
  const [products, setProducts] = useState([]);

  useEffect(() => {
    fetchProducts();
  }, []);

  const fetchProducts = async () => {
    await axios.get(`http://localhost:8000/api/products`).then(({ data }) => {
      setProducts(data);
    });
  };

  const deleteProduct = async (id) => {
    const isConfirm = await Swal.fire({
      title: "Sei sicuro?",
      text: "Questa operazione sarà irreversibile!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Sì, cancella",
    }).then((result) => {
      return result.isConfirmed;
    });

    if (!isConfirm) {
      return;
    }

    await axios
      .delete(`http://localhost:8000/api/products/${id}`)
      .then(({ data }) => {
        Swal.fire({
          icon: "success",
          text: data.message,
        });
        fetchProducts();
      })
      .catch(({ response: { data } }) => {
        Swal.fire({
          text: data.message,
          icon: "error",
        });
      });
  };

  return (
    <div className="container">
      <div className="row">
        <div className="col-12">
          <Link
            className="btn btn-primary mb-2 float-end"
            to={"/product/create"}
          >
            Aggiungi prodotto
          </Link>
        </div>
        <div className="col-12">
          <div className="card card-body">
            <div className="table-responsive">
              <table className="table mb-0 text-center">
                <thead>
                  <tr>
                    <th>Prodotto</th>
                    <th>Descrizione</th>
                    <th>Immagine</th>
                    <th>Azioni</th>
                  </tr>
                </thead>
                <tbody>
                  {products.length > 0 &&
                    products.map((row, key) => (
                      <tr key={key}>
                        <td>
                          <b>{row.title}</b>
                        </td>
                        <td>{row.description}</td>
                        <td>
                          <img
                            width="100px"
                            src={`http://localhost:8000/storage/product/image/${row.image}`}
                          />
                        </td>
                        <td>
                          <Link
                            to={`/product/edit/${row.id}`}
                            className="btn btn-success me-2"
                          >
                            Modifica
                          </Link>
                          <Button
                            variant="danger"
                            onClick={() => deleteProduct(row.id)}
                          >
                            Cancella
                          </Button>
                        </td>
                      </tr>
                    ))}
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  );
}
