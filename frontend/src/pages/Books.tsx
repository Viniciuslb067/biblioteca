import { useContext, useState } from "react";
import { Card, Modal } from "antd";
import { AiOutlineEdit } from "react-icons/ai";
import { BsTrash } from "react-icons/bs";
import { VscInfo } from "react-icons/vsc";
import { } from "react-router-dom";
import { SidebarContext } from "../contexts/SidebarContext";

import { useBook } from "../hooks/useBook";

import { api } from "../services/api";

import "../styles/books.scss";

export function Books() {
  const { isOpen } = useContext(SidebarContext);

  const [isModalVisibleShow, setIsModalVisibleShow] = useState<boolean>(false);

  const [id, setId] = useState<number>();
  const [genre_id, setGenreId] = useState<number>();
  const [title, setTitle] = useState<string>();
  const [releaseYear, setReleaseYear ] = useState<number>();
  const [type, setType] = useState<string>();

  const [authorId, setAuthorId] = useState<number>();
  const [authorName, setAuthorName] = useState<string>();
  const [birthDate, setBirthDate] = useState<string>();
  const [sex, setSex] = useState<string>();
  const [nationality, setNationality] = useState<string>();

  const [publisherId, setPublisherId] = useState<number>();
  const [publisherName, setPublisherName] = useState<string>();
  const [cnpj, setCnpj] = useState<number>();


  const { books } = useBook();

  function openModalAndGetId(id: number) {
    setIsModalVisibleShow(true);
    getData(id)
  }

  async function getData(id: number) {
    await api.get("api/book/"+id).then((res) => {
      
    });
  }

  return (
    <main className={isOpen ? "main-container" : "main-container-hide"}>
      <div className="page-header">
        <h1>Livros</h1>
      </div>

      <div className="grid">
        {books.map((item, key) => {
          return (
            <Card
              title={item.title}
              key={key}
              style={{ width: 300 }}
              actions={[
                <AiOutlineEdit size={20} />,
                <BsTrash size={20} />,
                <VscInfo size={20} onClick={() => openModalAndGetId(item.id)} />,
              ]}
            >
              <p>Autor: {item.author_name}</p>
              <p>Editora: {item.publisher_name}</p>
              <p>Gênero literário: {item.type}</p>
            </Card>
          );
        })}
      </div>

      <Modal title="Basic Modal" visible={isModalVisibleShow}>
        <p>Some contents...</p>
        <p>Some contents...</p>
        <p>Some contents...</p>
      </Modal>

    </main>
  );
}
