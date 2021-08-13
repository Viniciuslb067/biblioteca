import { useEffect, useState } from "react"; 
import { api } from "../services/api";

type Books = {
  id: number;
  title: string;
  author_name: string;
  publisher_name: string;
  type: string;
} 

export function useBook() {

  const [books, setBooks ] = useState<Books[]>([]);
  const [authorName, setAuthorName ] = useState<string>("");

  useEffect(() => {
    async function getData() {
      await api.get("/api/book").then((res) => {
        setBooks(res.data.books);
        console.log(res.data.books);
      });
    }

    getData();
  }, []);

  return { books }

}