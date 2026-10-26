# -*- mode: ruby -*-
# vi: set ft=ruby:

########################
#### Definició de variables ####
########################
IMATGE_BOX = "debian/bookworm64"
GESTORMV = "virtualbox"
NOM_NODE = "pj9f4a7"
NOM_BASE = "pj9f4a7"
ID = "jefrpe" # <--- Recorda canviar xxyyzz per les 2 primeres lletres del teu nom i cognoms
NOM_DOMINI = ".fjeclot.local"
MEMORIA_RAM = "2048"
NUM_CPUS = "2"
PORT1_GUEST = "80"
PORT1_HOST = "8000"
PORT2_GUEST = "443"
PORT2_HOST = "8443"
PORT3_GUEST = "3306"
PORT3_HOST = "13306"
PROT = "tcp"
CARPETA_HOST = "codis"
CARPETA_GUEST = "/home/vagrant/codis"
LLISTAT_PROGRAMARI_BASIC = "net-tools whois aptitude git zip unzip openssh-server"
LLISTAT_PROGRAMARI_DEPENDENCIES_DOCKER = "ca-certificates curl gnupg"
LLISTAT_PROGRAMARI_DOCKER = "docker-ce docker-ce-cli containerd.io docker-buildx-plugin docker-compose-plugin"
USUARI_VAGRANT = "vagrant"
GRUPS_USUARI_VAGRANT = "docker"

#######################################
#### Creació i definició de la màquina virtual #######
#######################################
Vagrant.configure("2") do |maquines|
  # Definició del identificador de màquina
  maquines.vm.define NOM_NODE + ID do |maquina|
    
    # Definició de paràmetres de la màquina virtual
    maquina.vm.provider GESTORMV do |parametres|
      parametres.name = NOM_NODE + ID
      parametres.memory = MEMORIA_RAM
      parametres.cpus = NUM_CPUS
      parametres.customize ['modifyvm', :id, '--clipboard', 'bidirectional', '--groups', '/ASIX2_PJ9']
    end

    # Definició de paràmetres del sistema de la màquina virtual
    maquina.vm.box = IMATGE_BOX
    maquina.vm.hostname = NOM_BASE + ID + NOM_DOMINI
    maquina.vm.network "forwarded_port", guest: PORT1_GUEST, host: PORT1_HOST, protocol: PROT
    maquina.vm.network "forwarded_port", guest: PORT2_GUEST, host: PORT2_HOST, protocol: PROT
    maquina.vm.network "forwarded_port", guest: PORT3_GUEST, host: PORT3_HOST, protocol: PROT
    maquina.vm.synced_folder CARPETA_HOST, CARPETA_GUEST

    ### Aprovisionament de programari i configuració###
    maquina.vm.provision "shell", inline: <<-SHELL
      sudo apt-get update -y
      sudo apt-get install -y #{LLISTAT_PROGRAMARI_BASIC}
      sudo apt-get install -y #{LLISTAT_PROGRAMARI_DEPENDENCIES_DOCKER}
      
      sudo install -m 0755 -d /etc/apt/keyrings
      curl -fsSL https://download.docker.com/linux/debian/gpg | \
      sudo gpg --dearmor -o /usr/share/keyrings/docker.gpg
      sudo chmod a+r /usr/share/keyrings/docker.gpg

      echo "deb [arch=\$(dpkg --print-architecture) signed-by=/usr/share/keyrings/docker.gpg] \
      https://download.docker.com/linux/debian bookworm stable" | \
      sudo tee /etc/apt/sources.list.d/docker.list > /dev/null
      
      sudo apt-get -y update
      sudo apt-get install -y #{LLISTAT_PROGRAMARI_DOCKER}
      sudo usermod -aG #{GRUPS_USUARI_VAGRANT} #{USUARI_VAGRANT}
    SHELL
  end
end