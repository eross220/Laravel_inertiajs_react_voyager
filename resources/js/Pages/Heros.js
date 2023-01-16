import React, {useEffect} from 'react';
import Helmet from 'react-helmet';
import { usePage } from '@inertiajs/inertia-react';
import MainLayout from '@/Layouts/Main';
import {Breadcrumb, Card, Table} from "react-bootstrap";
export default function Home(props) {
  const { auth } = usePage();
  let data = props.heros;

  return (
    <MainLayout>
      <Helmet title="Heroes" />
     
      <div className="flex flex-col items-center">
        <Card border="light" className="shadow-sm mb-4">
                  <Card.Body className="pb-0">
                      <Table striped bordered hover size="md" className="table-centered table-nowrap rounded mb-0">
                        <thead className="thead-dark">
                          <tr>
                              <th className="border-10">id</th>
                              <th className="border-0">name</th>
                              <th className="border-0">total_damage</th>
                              

                          </tr>
                        </thead>
                        <tbody>
                          {
                              data.map(({id,name,total_damage})=>(
                                  <tr key={id}>
                                      <td className="border-0">{id}</td>
                                      <td className="border-0">{name}</td>
                                      <td className="fw-bold border-0 break-spaces" >{total_damage}</td>

                                  </tr>
                              ))
                          }
                          {data.length === 0 && (
                              <tr>
                                  <td className="px-6 py-4 border-t" colSpan="4">
                                      No Roles found.
                                  </td>
                              </tr>
                          )}

                        </tbody>
                      </Table>
                  </Card.Body>
        </Card>
      </div>
           
    </MainLayout>
  );
}