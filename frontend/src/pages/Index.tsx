import { BsBook } from "react-icons/bs";

import "../styles/index.scss";

export function Index() {
  return (
    <div className="contentWrapper">

      <BsBook/>

      <div className="container">
        <div className="form">
          <p>Login</p>

          <div className="fields">
            <input
              type="text"
              required
            />
            <span></span>
            <label htmlFor=""><span>Email</span></label>
          </div>

          <div className="fields">
            <input
              type="password"
              required
            />
            <span></span>
            <label htmlFor="">Senha</label>
          </div>

          <button type="submit">
            ENTRAR
          </button>
        </div>
      </div>
    </div>
    )
}