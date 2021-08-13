import "../styles/home.scss";

export function Home() {
  return (
    <div>
      <main className="container">
        <div>
          <img src="" alt="" />
          <h2>Bem-vindo à <br/>Biblioteca Virtual!</h2>

          <div className="loginContainer">
            <div>
              <h3>Login</h3>
              <p>Identifique-se para prosseguir</p>
              <form action="#" className="loginForm">

                <div className="fields">
                  <label htmlFor="">E-mail</label>
                  <input type="text" />
                </div>

                <div className="fields">
                  <label htmlFor="">Senha</label>
                  <input type="text" />
                </div>
                
                <button>Acessar</button>

              </form>
            </div>
          </div>

        </div>
      </main>
    </div>
    )
}