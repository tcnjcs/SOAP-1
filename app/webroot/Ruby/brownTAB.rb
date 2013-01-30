require 'csv'
require 'net/http'

class EPA
	def initialize(county, owner, add, muni, pname,pnum,py,sid,ssx,ssy)
		@county=county
		@owner=owner
		@add=add
		@muni=muni
		@pname=pname
		@pnum=pnum
		@py=py
		@sid=sid
		@ssx=ssx
		@ssy=ssy
	end
	
	def outputfile
		File.open("epaformat.sql", 'a') { |file| file.puts("INSERT INTO brownfields VALUES ('"+String(@county)+"','"+String(@owner)+"','"+(String(@add).delete "\'")+"','"+(String(@muni).delete "\'")+"','"+(String(@pname).delete "\'")+ "','"+String(@pnum)+"','"+String(@py)+"','"+String(@sid)+"','"+String(@ssx)+"','"+(String(@ssy).delete "\n")+"');")}
	end
	
	def display
		puts @sid #+ "\t" + pname + "\t" + muni + "\t" + owner + "\t" + add
	end
	
end

Net::HTTP.start("nj.gov") { |http|
  resp = http.get("/dep/srp/kcsnj/kcsnj_active.txt")
  open("kcsnj.txt", "wb") { |file|
    file.write(resp.body)
   }
}

File.open("kcsnj.txt", "r") do |infile|
	count=1
	while(line=infile.gets)
		if (count==1)
			count=1+count
		else
			scounty,sowner,sadd,smuni,spname,spnum,spx,spy,ssid,ssx,ssy=line.split(/\t/)
			omega=EPA.new(scounty,sowner,sadd,smuni,spname,spx,spy,ssid,ssx,ssy)
			omega.outputfile
		end	
	end
	puts 'done'
end
