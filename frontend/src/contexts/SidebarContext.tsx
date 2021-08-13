import { createContext, ReactNode, useState } from "react";

interface SidebarContextData {
  isOpen: boolean;
  closeSidebar: () => void;
  openSidebar: () => void;
}

interface SidebarProvidorProps {
  children: ReactNode;
}

export const SidebarContext = createContext({} as SidebarContextData);

export function SidebarProvider({ children }: SidebarProvidorProps) {
  const [isOpen, setIsOpen] = useState(false);

  function openSidebar() {
    setIsOpen(true);
  }

  function closeSidebar() {
    setIsOpen(false);
  }

  return (
    <SidebarContext.Provider value={{ closeSidebar, openSidebar, isOpen }}>
      {children}
    </SidebarContext.Provider>
  );
}
