import { useContext } from "react";

import { BsList } from "react-icons/bs";
import { AiOutlineArrowRight } from "react-icons/ai";
import { SidebarContext } from "../../contexts/SidebarContext";

import "./styles.scss";

export function Header() {
  const { openSidebar, closeSidebar, isOpen } = useContext(SidebarContext);

  return (
    <>
      <div className={isOpen ? "mainContent" : "mainContentHide"}>
        <header>
          <div className="menuToggle">
            <label htmlFor="mainContentHide">
              <span>
                {isOpen ? (
                  <AiOutlineArrowRight onClick={() => closeSidebar()} />
                ) : (
                  <BsList onClick={() => openSidebar()} />
                )}
              </span>
            </label>
          </div>

          <div className="headerIcons">
            <button>Logout</button>
          </div>
        </header>
      </div>
    </>
  );
}
