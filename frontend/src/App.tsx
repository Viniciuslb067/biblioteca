import { BrowserRouter, Route, Switch } from "react-router-dom";

import { Index } from "./pages/Index";
import { Home } from "./pages/Home";
import { Books } from "./pages/Books";

import { Header } from "./components/Header";
import { Sidebar } from "./components/Sidebar";

import { SidebarProvider } from "./contexts/SidebarContext";

function App() {
  return (
    <BrowserRouter>
      <SidebarProvider>
        <Header />
        <Sidebar />
        <Switch>
          <Route path="/" exact component={Index} />
          <Route path="/home" exact component={Home} />
          <Route path="/books" exact component={Books} />
        </Switch>
      </SidebarProvider>
    </BrowserRouter>
  );
}

export default App;
