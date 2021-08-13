import { useContext } from "react";
import { Link, useHistory } from "react-router-dom";
import { SidebarContext } from "../../contexts/SidebarContext";

import { AiOutlineHome } from "react-icons/ai";
import { BiBookBookmark } from "react-icons/bi";
import { GiFeather } from "react-icons/gi";
import { HiOutlineUsers } from "react-icons/hi";

import logo from "../../assets/logo.png";

import "./styles.scss";

export function Sidebar() {
  const { isOpen } = useContext(SidebarContext);
  const history = useHistory();

  return (
    <>
      <div className={isOpen ? "sidebar" : "sidebarHide"}>
        <div className="sidebarMain">
          <div className="sidebarUser">
            <img
              src={logo}
              alt="Logo"
              className={isOpen ? "imgOpen" : "imgClose"}
            />
            <div>
              <h3>{isOpen ? "Vinicius" : ""}</h3>
            </div>
          </div>

          <div className="sidebarMenu">
            <div className="menuHead">
              <span>{isOpen ? "Dashboard" : ""}</span>
            </div>
            <ul>
              <li>
                <a>
                  <span>{isOpen ? <AiOutlineHome /> : ""}</span>
                  {isOpen ? "Home" : ""}
                </a>
              </li>
              <li>
                <a>
                  <Link to="/books">
                    <span> {isOpen ? <BiBookBookmark /> : ""}</span>
                    {isOpen ? "Livros" : ""}
                  </Link>
                </a>
              </li>
              <li>
                <a>
                  <Link to="/">
                    <span>{isOpen ? <HiOutlineUsers /> : ""}</span>
                    {isOpen ? "Autores" : ""}
                  </Link>
                </a>
              </li>
              <li>
                <a>
                  <Link to="/">
                    <span>{isOpen ? <GiFeather /> : ""}</span>
                    {isOpen ? "Editoras" : ""}
                  </Link>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </>
  );
}
